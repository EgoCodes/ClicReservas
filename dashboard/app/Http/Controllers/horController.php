<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatehorRequest;
use App\Http\Requests\UpdatehorRequest;
use App\Repositories\horRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class horController extends AppBaseController
{
    /** @var  horRepository */
    private $horRepository;

    public function __construct(horRepository $horRepo)
    {
        $this->horRepository = $horRepo;
    }

    /**
     * Display a listing of the hor.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $hors = $this->horRepository->all();

        return view('hors.index')
            ->with('hors', $hors);
    }

    /**
     * Show the form for creating a new hor.
     *
     * @return Response
     */
    public function create()
    {
        return view('hors.create');
    }

    /**
     * Store a newly created hor in storage.
     *
     * @param CreatehorRequest $request
     *
     * @return Response
     */
    public function store(CreatehorRequest $request)
    {
        $input = $request->all();

        $hor = $this->horRepository->create($input);

        Flash::success('Hor saved successfully.');

        return redirect(route('hors.index'));
    }

    /**
     * Display the specified hor.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $hor = $this->horRepository->find($id);

        if (empty($hor)) {
            Flash::error('Hor not found');

            return redirect(route('hors.index'));
        }

        return view('hors.show')->with('hor', $hor);
    }

    /**
     * Show the form for editing the specified hor.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $hor = $this->horRepository->find($id);

        if (empty($hor)) {
            Flash::error('Hor not found');

            return redirect(route('hors.index'));
        }

        return view('hors.edit')->with('hor', $hor);
    }

    /**
     * Update the specified hor in storage.
     *
     * @param int $id
     * @param UpdatehorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatehorRequest $request)
    {
        $hor = $this->horRepository->find($id);

        if (empty($hor)) {
            Flash::error('Hor not found');

            return redirect(route('hors.index'));
        }

        $hor = $this->horRepository->update($request->all(), $id);

        Flash::success('Hor updated successfully.');

        return redirect(route('hors.index'));
    }

    /**
     * Remove the specified hor from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $hor = $this->horRepository->find($id);

        if (empty($hor)) {
            Flash::error('Hor not found');

            return redirect(route('hors.index'));
        }

        $this->horRepository->delete($id);

        Flash::success('Hor deleted successfully.');

        return redirect(route('hors.index'));
    }
}
