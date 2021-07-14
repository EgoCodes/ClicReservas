<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateperfilCliRequest;
use App\Http\Requests\UpdateperfilCliRequest;
use App\Repositories\perfilCliRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class perfilCliController extends AppBaseController
{
    /** @var  perfilCliRepository */
    private $perfilCliRepository;

    public function __construct(perfilCliRepository $perfilCliRepo)
    {
        $this->perfilCliRepository = $perfilCliRepo;
    }

    /**
     * Display a listing of the perfilCli.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $perfilClis = $this->perfilCliRepository->all();

        return view('perfil_clis.index')
            ->with('perfilClis', $perfilClis);
    }

    /**
     * Show the form for creating a new perfilCli.
     *
     * @return Response
     */
    public function create()
    {
        return view('perfil_clis.create');
    }

    /**
     * Store a newly created perfilCli in storage.
     *
     * @param CreateperfilCliRequest $request
     *
     * @return Response
     */
    public function store(CreateperfilCliRequest $request)
    {
        $input = $request->all();

        $perfilCli = $this->perfilCliRepository->create($input);

        Flash::success('Perfil Cli saved successfully.');

        return redirect(route('perfilClis.index'));
    }

    /**
     * Display the specified perfilCli.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $perfilCli = $this->perfilCliRepository->find($id);

        if (empty($perfilCli)) {
            Flash::error('Perfil Cli not found');

            return redirect(route('perfilClis.index'));
        }

        return view('perfil_clis.show')->with('perfilCli', $perfilCli);
    }

    /**
     * Show the form for editing the specified perfilCli.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $perfilCli = $this->perfilCliRepository->find($id);

        if (empty($perfilCli)) {
            Flash::error('Perfil Cli not found');

            return redirect(route('perfilClis.index'));
        }

        return view('perfil_clis.edit')->with('perfilCli', $perfilCli);
    }

    /**
     * Update the specified perfilCli in storage.
     *
     * @param int $id
     * @param UpdateperfilCliRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateperfilCliRequest $request)
    {
        $perfilCli = $this->perfilCliRepository->find($id);

        if (empty($perfilCli)) {
            Flash::error('Perfil Cli not found');

            return redirect(route('perfilClis.index'));
        }

        $perfilCli = $this->perfilCliRepository->update($request->all(), $id);

        Flash::success('Perfil Cli updated successfully.');

        return redirect(route('perfilClis.index'));
    }

    /**
     * Remove the specified perfilCli from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $perfilCli = $this->perfilCliRepository->find($id);

        if (empty($perfilCli)) {
            Flash::error('Perfil Cli not found');

            return redirect(route('perfilClis.index'));
        }

        $this->perfilCliRepository->delete($id);

        Flash::success('Perfil Cli deleted successfully.');

        return redirect(route('perfilClis.index'));
    }
}
