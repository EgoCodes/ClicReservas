<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatebarriRequest;
use App\Http\Requests\UpdatebarriRequest;
use App\Repositories\barriRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class barriController extends AppBaseController
{
    /** @var  barriRepository */
    private $barriRepository;

    public function __construct(barriRepository $barriRepo)
    {
        $this->barriRepository = $barriRepo;
    }

    /**
     * Display a listing of the barri.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $barris = $this->barriRepository->all();

        return view('barris.index')
            ->with('barris', $barris);
    }

    /**
     * Show the form for creating a new barri.
     *
     * @return Response
     */
    public function create()
    {
        return view('barris.create');
    }

    /**
     * Store a newly created barri in storage.
     *
     * @param CreatebarriRequest $request
     *
     * @return Response
     */
    public function store(CreatebarriRequest $request)
    {
        $input = $request->all();

        $barri = $this->barriRepository->create($input);

        Flash::success('Barri saved successfully.');

        return redirect(route('barris.index'));
    }

    /**
     * Display the specified barri.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $barri = $this->barriRepository->find($id);

        if (empty($barri)) {
            Flash::error('Barri not found');

            return redirect(route('barris.index'));
        }

        return view('barris.show')->with('barri', $barri);
    }

    /**
     * Show the form for editing the specified barri.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $barri = $this->barriRepository->find($id);

        if (empty($barri)) {
            Flash::error('Barri not found');

            return redirect(route('barris.index'));
        }

        return view('barris.edit')->with('barri', $barri);
    }

    /**
     * Update the specified barri in storage.
     *
     * @param int $id
     * @param UpdatebarriRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatebarriRequest $request)
    {
        $barri = $this->barriRepository->find($id);

        if (empty($barri)) {
            Flash::error('Barri not found');

            return redirect(route('barris.index'));
        }

        $barri = $this->barriRepository->update($request->all(), $id);

        Flash::success('Barri updated successfully.');

        return redirect(route('barris.index'));
    }

    /**
     * Remove the specified barri from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $barri = $this->barriRepository->find($id);

        if (empty($barri)) {
            Flash::error('Barri not found');

            return redirect(route('barris.index'));
        }

        $this->barriRepository->delete($id);

        Flash::success('Barri deleted successfully.');

        return redirect(route('barris.index'));
    }
}
