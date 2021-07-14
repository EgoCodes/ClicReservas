<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateventanillaRequest;
use App\Http\Requests\UpdateventanillaRequest;
use App\Repositories\ventanillaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ventanillaController extends AppBaseController
{
    /** @var  ventanillaRepository */
    private $ventanillaRepository;

    public function __construct(ventanillaRepository $ventanillaRepo)
    {
        $this->ventanillaRepository = $ventanillaRepo;
    }

    /**
     * Display a listing of the ventanilla.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $ventanillas = $this->ventanillaRepository->all();

        return view('ventanillas.index')
            ->with('ventanillas', $ventanillas);
    }

    /**
     * Show the form for creating a new ventanilla.
     *
     * @return Response
     */
    public function create()
    {
        return view('ventanillas.create');
    }

    /**
     * Store a newly created ventanilla in storage.
     *
     * @param CreateventanillaRequest $request
     *
     * @return Response
     */
    public function store(CreateventanillaRequest $request)
    {
        $input = $request->all();

        $ventanilla = $this->ventanillaRepository->create($input);

        Flash::success('Ventanilla saved successfully.');

        return redirect(route('ventanillas.index'));
    }

    /**
     * Display the specified ventanilla.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ventanilla = $this->ventanillaRepository->find($id);

        if (empty($ventanilla)) {
            Flash::error('Ventanilla not found');

            return redirect(route('ventanillas.index'));
        }

        return view('ventanillas.show')->with('ventanilla', $ventanilla);
    }

    /**
     * Show the form for editing the specified ventanilla.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ventanilla = $this->ventanillaRepository->find($id);

        if (empty($ventanilla)) {
            Flash::error('Ventanilla not found');

            return redirect(route('ventanillas.index'));
        }

        return view('ventanillas.edit')->with('ventanilla', $ventanilla);
    }

    /**
     * Update the specified ventanilla in storage.
     *
     * @param int $id
     * @param UpdateventanillaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateventanillaRequest $request)
    {
        $ventanilla = $this->ventanillaRepository->find($id);

        if (empty($ventanilla)) {
            Flash::error('Ventanilla not found');

            return redirect(route('ventanillas.index'));
        }

        $ventanilla = $this->ventanillaRepository->update($request->all(), $id);

        Flash::success('Ventanilla updated successfully.');

        return redirect(route('ventanillas.index'));
    }

    /**
     * Remove the specified ventanilla from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ventanilla = $this->ventanillaRepository->find($id);

        if (empty($ventanilla)) {
            Flash::error('Ventanilla not found');

            return redirect(route('ventanillas.index'));
        }

        $this->ventanillaRepository->delete($id);

        Flash::success('Ventanilla deleted successfully.');

        return redirect(route('ventanillas.index'));
    }
}
