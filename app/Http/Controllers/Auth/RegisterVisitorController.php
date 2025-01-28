<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterVisitorController extends Controller
{
    public function index()
    {
        return view('auth.register-visitor');

    }

    public function registerVisitor(RegisterRequest $request)
    {
        $validatedData = $request->validated();

        $validatedData['role_id'] =  DB::table('roles')->where('role', 'visitor')->value('id');
        $validatedData['status_id'] = DB::table('statuses')->where('status', 'pending')->value('id');
        $validatedData['password'] = Hash::make($validatedData['password']);

        $userValidatedData = [
            'role_id' => $validatedData['role_id'],
            'status_id' => $validatedData['status_id'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'],
        ]; 

        DB::beginTransaction();

        try {

            $user = User::create($userValidatedData);

            $visitorValidatedData =[
                'user_id' => $user->id,
                'full_name' => $validatedData['full_name'],
                'phone' => $validatedData['phone'],
            ];

            Student::create($visitorValidatedData);

            DB::commit();

            // Auth::login($user, true);

            return back()->with('pendingRegister', 'Akun yang anda daftarkan telah diproses, silakan tunggu untuk  persetujuan dari operator.');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('registerFailed', 'Gagal melakukan pendaftaran akun: ' . $e->getMessage());
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
