<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatecantVentRequest;
use App\Http\Requests\UpdatecantVentRequest;
use App\Repositories\cantVentRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class cantVentController extends AppBaseController
{
    /** @var  cantVentRepository */
    private $cantVentRepository;

    public function __construct(cantVentRepository $cantVentRepo)
    {
        $this->cantVentRepository = $cantVentRepo;
    }

    /**
     * Display a listing of the cantVent.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $cantVents = $this->cantVentRepository->all();

        return view('cant_vents.index')
            ->with('cantVents', $cantVents);
    }

    /**
     * Show the form for creating a new cantVent.
     *
     * @return Response
     */
    public function create()
    {
        return view('cant_vents.create');
    }

    /**
     * Store a newly created cantVent in storage.
     *
     * @param CreatecantVentRequest $request
     *
     * @return Response
     */
    public function store(CreatecantVentRequest $request)
    {
        $input = $request->all();

        $cantVent = $this->cantVentRepository->create($input);

        Flash::success('Cant Vent saved successfully.');

        return redirect(route('cantVents.index'));
    }

    /**
     * Display the specified cantVent.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cantVent = $this->cantVentRepository->find($id);

        if (empty($cantVent)) {
            Flash::error('Cant Vent not found');

            return redirect(route('cantVents.index'));
        }

        return view('cant_vents.show')->with('cantVent', $cantVent);
    }

    /**
     * Show the form for editing the specified cantVent.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cantVent = $this->cantVentRepository->find($id);

        if (empty($cantVent)) {
            Flash::error('Cant Vent not found');

            return redirect(route('cantVents.index'));
        }

        return view('cant_vents.edit')->with('cantVent', $cantVent);
    }

    /**
     * Update the specified cantVent in storage.
     *
     * @param int $id
     * @param UpdatecantVentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecantVentRequest $request)
    {
        $cantVent = $this->cantVentRepository->find($id);

        if (empty($cantVent)) {
            Flash::error('Cant Vent not found');

            return redirect(route('cantVents.index'));
        }

        $cantVent = $this->cantVentRepository->update($request->all(), $id);

        Flash::success('Cant Vent updated successfully.');

        return redirect(route('cantVents.index'));
    }

    /**
     * Remove the specified cantVent from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cantVent = $this->cantVentRepository->find($id);

        if (empty($cantVent)) {
            Flash::error('Cant Vent not found');

            return redirect(route('cantVents.index'));
        }

        $this->cantVentRepository->delete($id);

        Flash::success('Cant Vent deleted successfully.');

        return redirect(route('cantVents.index'));
    }
}
