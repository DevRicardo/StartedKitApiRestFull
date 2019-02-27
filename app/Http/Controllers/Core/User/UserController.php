<?php

namespace App\Http\Controllers\Core\User;


use App\Http\Controllers\Controller;
use App\Http\Requests\Core\User\UserStoreRequest;
use App\Http\Requests\Core\User\UserUpdateRequest;
use App\Http\Traits\Core\FormatResponse;
use App\Models\Core\User;
use App\Http\Repositories\Core\User\UserRepository;
use App\Http\Requests\Core\SearchRequest;


class UserController extends Controller
{
    use FormatResponse;


    private $userRepository;


    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SearchRequest $request)
    {
        
        //
        $result = $this->userRepository->find($request->search);

        return $this->success("Listado de usuarios", [
            $result
        ], 200);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {        
        $request['password'] = bcrypt($request->password);
        $user = $this->userRepository->store($request->all());
        return $this->success("Usuario creado", [
            $user
        ], 200);
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $user = $this->userRepository->show($user);
        return $this->success("Usuario encontrado", [
            $user
        ], 200);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $user = $this->userRepository->update($request->all(), $user);
        return $this->success("Usuario actualizado", [
            $user
        ], 200);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if(!$this->userRepository->delete($user)){
            return $this->error("Usuario no se pudo eliminar", [], 500);
        }
        return $this->success("Usuario eliminado", [], 200);
    }
}
