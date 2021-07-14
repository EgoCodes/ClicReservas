<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatecomprasCliRequest;
use App\Http\Requests\UpdatecomprasCliRequest;
use App\Repositories\comprasCliRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class comprasCliController extends AppBaseController
{
    /** @var  comprasCliRepository */
    private $comprasCliRepository;

    public function __construct(comprasCliRepository $comprasCliRepo)
    {
        $this->comprasCliRepository = $comprasCliRepo;
    }

    /**
     * Display a listing of the comprasCli.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $comprasClis = $this->comprasCliRepository->all();

        return view('compras_clis.index')
            ->with('comprasClis', $comprasClis);
    }

    /**
     * Show the form for creating a new comprasCli.
     *
     * @return Response
     */
    public function create()
    {
        return view('compras_clis.create');
    }

    /**
     * Store a newly created comprasCli in storage.
     *
     * @param CreatecomprasCliRequest $request
     *
     * @return Response
     */
    public function store(CreatecomprasCliRequest $request)
    {
        $input = $request->all();

        $comprasCli = $this->comprasCliRepository->create($input);

        Flash::success('Compras Cli saved successfully.');

        return redirect(route('comprasClis.index'));
    }

    /**
     * Display the specified comprasCli.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $comprasCli = $this->comprasCliRepository->find($id);

        if (empty($comprasCli)) {
            Flash::error('Compras Cli not found');

            return redirect(route('comprasClis.index'));
        }

        return view('compras_clis.show')->with('comprasCli', $comprasCli);
    }

    /**
     * Show the form for editing the specified comprasCli.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $comprasCli = $this->comprasCliRepository->find($id);

        if (empty($comprasCli)) {
            Flash::error('Compras Cli not found');

            return redirect(route('comprasClis.index'));
        }

        return view('compras_clis.edit')->with('comprasCli', $comprasCli);
    }

    /**
     * Update the specified comprasCli in storage.
     *
     * @param int $id
     * @param UpdatecomprasCliRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecomprasCliRequest $request)
    {
        $comprasCli = $this->comprasCliRepository->find($id);

        if (empty($comprasCli)) {
            Flash::error('Compras Cli not found');

            return redirect(route('comprasClis.index'));
        }

        $comprasCli = $this->comprasCliRepository->update($request->all(), $id);

        Flash::success('Compras Cli updated successfully.');

        return redirect(route('comprasClis.index'));
    }

    /**
     * Remove the specified comprasCli from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $comprasCli = $this->comprasCliRepository->find($id);

        if (empty($comprasCli)) {
            Flash::error('Compras Cli not found');

            return redirect(route('comprasClis.index'));
        }

        $this->comprasCliRepository->delete($id);

        Flash::success('Compras Cli deleted successfully.');

        return redirect(route('comprasClis.index'));
    }
}
