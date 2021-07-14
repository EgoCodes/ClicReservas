<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateempHorarioRequest;
use App\Http\Requests\UpdateempHorarioRequest;
use App\Repositories\empHorarioRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class empHorarioController extends AppBaseController
{
    /** @var  empHorarioRepository */
    private $empHorarioRepository;

    public function __construct(empHorarioRepository $empHorarioRepo)
    {
        $this->empHorarioRepository = $empHorarioRepo;
    }

    /**
     * Display a listing of the empHorario.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $empHorarios = $this->empHorarioRepository->all();

        return view('emp_horarios.index')
            ->with('empHorarios', $empHorarios);
    }

    /**
     * Show the form for creating a new empHorario.
     *
     * @return Response
     */
    public function create()
    {
        return view('emp_horarios.create');
    }

    /**
     * Store a newly created empHorario in storage.
     *
     * @param CreateempHorarioRequest $request
     *
     * @return Response
     */
    public function store(CreateempHorarioRequest $request)
    {
        $input = $request->all();

        $empHorario = $this->empHorarioRepository->create($input);

        Flash::success('Emp Horario saved successfully.');

        return redirect(route('empHorarios.index'));
    }

    /**
     * Display the specified empHorario.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $empHorario = $this->empHorarioRepository->find($id);

        if (empty($empHorario)) {
            Flash::error('Emp Horario not found');

            return redirect(route('empHorarios.index'));
        }

        return view('emp_horarios.show')->with('empHorario', $empHorario);
    }

    /**
     * Show the form for editing the specified empHorario.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $empHorario = $this->empHorarioRepository->find($id);

        if (empty($empHorario)) {
            Flash::error('Emp Horario not found');

            return redirect(route('empHorarios.index'));
        }

        return view('emp_horarios.edit')->with('empHorario', $empHorario);
    }

    /**
     * Update the specified empHorario in storage.
     *
     * @param int $id
     * @param UpdateempHorarioRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateempHorarioRequest $request)
    {
        $empHorario = $this->empHorarioRepository->find($id);

        if (empty($empHorario)) {
            Flash::error('Emp Horario not found');

            return redirect(route('empHorarios.index'));
        }

        $empHorario = $this->empHorarioRepository->update($request->all(), $id);

        Flash::success('Emp Horario updated successfully.');

        return redirect(route('empHorarios.index'));
    }

    /**
     * Remove the specified empHorario from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $empHorario = $this->empHorarioRepository->find($id);

        if (empty($empHorario)) {
            Flash::error('Emp Horario not found');

            return redirect(route('empHorarios.index'));
        }

        $this->empHorarioRepository->delete($id);

        Flash::success('Emp Horario deleted successfully.');

        return redirect(route('empHorarios.index'));
    }
}
