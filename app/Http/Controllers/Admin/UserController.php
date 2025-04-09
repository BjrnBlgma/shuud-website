<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function index(Request $request): Response
    {
        $query = User::query();

        // Поиск по столбцам
        if ($search = $request->get('search')) {
            $query->where(function ($q) use ($search) {
                $columns = ['id', 'name', 'email', 'created_at'];
                foreach ($columns as $column) {
                    $q->orWhere($column, 'like', "%{$search}%");
                }
            });
        }

        // Сортировка (по умолчанию — по id)
        $sortBy = $request->get('sortBy', 'id');
        $sortDirection = $request->get('sortDirection', 'asc');
        if (in_array($sortBy, ['id', 'name', 'email', 'role', 'created_at'])) {
            $query->orderBy($sortBy, $sortDirection);
        }

        // Пагинация
        $perPage = $request->get('perPage', 5);
        $users = $query->paginate($perPage)->withQueryString();

        return Inertia::render('Admin/users/Index', [
            'users' => $users,
            'filters' => $request->only(['search', 'sortBy', 'sortDirection', 'perPage']),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => 'required|in:user,support,admin',
        ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        event(new Registered($user));

        return redirect()->route('dashboard.users.index');
    }

    public function create(): Response
    {
        return Inertia::render('Admin/users/Create');
    }

    public function edit(User $user): Response
    {
        return Inertia::render('Admin/users/Edit', ['user' => $user]);
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:user,support,admin',
        ]);

        $user->update($validated);
        return redirect()->route('dashboard.users.index');
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();
        return redirect()->route('dashboard.users.index');
    }
}
