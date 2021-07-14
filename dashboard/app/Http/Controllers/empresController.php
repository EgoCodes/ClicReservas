<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateempresRequest;
use App\Http\Requests\UpdateempresRequest;
use App\Repositories\empresRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class empresController extends AppBaseController
{
    /** @var  empresRepository */
    private $empresRepository;

    public function __construct(empresRepository $empresRepo)
    {
        $this->empresRepository = $empresRepo;
    }

    /**
     * Display a listing of the empres.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $empres = $this->empresRepository->all();

        return view('empres.index')
            ->with('empres', $empres);
    }

    /**
     * Show the form for creating a new empres.
     *
     * @return Response
     */
    public function create()
    {
        return view('empres.create');
    }

    /**
     * Store a newly created empres in storage.
     *
     * @param CreateempresRequest $request
     *
     * @return Response
     */
    public function store(CreateempresRequest $request)
    {
        $input = $request->all();

        $empres = $this->empresRepository->create($input);

        Flash::success('Empres saved successfully.');

        return redirect(route('empres.index'));
    }

    /**
     * Display the specified empres.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $empres = $this->empresRepository->find($id);

        if (empty($empres)) {
            Flash::error('Empres not found');

            return redirect(route('empres.index'));
        }

        return view('empres.show')->with('empres', $empres);
    }

    /**
     * Show the form for editing the specified empres.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $empres = $this->empresRepository->find($id);

        if (empty($empres)) {
            Flash::error('Empres not found');

            return redirect(route('empres.index'));
        }

        return view('empres.edit')->with('empres', $empres);
    }

    /**
     * Update the specified empres in storage.
     *
     * @param int $id
     * @param UpdateempresRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateempresRequest $request)
    {
        $empres = $this->empresRepository->find($id);

        if (empty($empres)) {
            Flash::error('Empres not found');

            return redirect(route('empres.index'));
        }

        $empres = $this->empresRepository->update($request->all(), $id);

        Flash::success('Empres updated successfully.');

        return redirect(route('empres.index'));
    }

    /**
     * Remove the specified empres from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $empres = $this->empresRepository->find($id);

        if (empty($empres)) {
            Flash::error('Empres not found');

            return redirect(route('empres.index'));
        }

        $this->empresRepository->delete($id);

        Flash::success('Empres deleted successfully.');

        return redirect(route('empres.index'));
    }
}
