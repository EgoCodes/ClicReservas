<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateempInfoRequest;
use App\Http\Requests\UpdateempInfoRequest;
use App\Repositories\empInfoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class empInfoController extends AppBaseController
{
    /** @var  empInfoRepository */
    private $empInfoRepository;

    public function __construct(empInfoRepository $empInfoRepo)
    {
        $this->empInfoRepository = $empInfoRepo;
    }

    /**
     * Display a listing of the empInfo.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $empInfos = $this->empInfoRepository->all();

        return view('emp_infos.index')
            ->with('empInfos', $empInfos);
    }

    /**
     * Show the form for creating a new empInfo.
     *
     * @return Response
     */
    public function create()
    {
        return view('emp_infos.create');
    }

    /**
     * Store a newly created empInfo in storage.
     *
     * @param CreateempInfoRequest $request
     *
     * @return Response
     */
    public function store(CreateempInfoRequest $request)
    {
        $input = $request->all();

        $empInfo = $this->empInfoRepository->create($input);

        Flash::success('Emp Info saved successfully.');

        return redirect(route('empInfos.index'));
    }

    /**
     * Display the specified empInfo.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $empInfo = $this->empInfoRepository->find($id);

        if (empty($empInfo)) {
            Flash::error('Emp Info not found');

            return redirect(route('empInfos.index'));
        }

        return view('emp_infos.show')->with('empInfo', $empInfo);
    }

    /**
     * Show the form for editing the specified empInfo.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $empInfo = $this->empInfoRepository->find($id);

        if (empty($empInfo)) {
            Flash::error('Emp Info not found');

            return redirect(route('empInfos.index'));
        }

        return view('emp_infos.edit')->with('empInfo', $empInfo);
    }

    /**
     * Update the specified empInfo in storage.
     *
     * @param int $id
     * @param UpdateempInfoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateempInfoRequest $request)
    {
        $empInfo = $this->empInfoRepository->find($id);

        if (empty($empInfo)) {
            Flash::error('Emp Info not found');

            return redirect(route('empInfos.index'));
        }

        $empInfo = $this->empInfoRepository->update($request->all(), $id);

        Flash::success('Emp Info updated successfully.');

        return redirect(route('empInfos.index'));
    }

    /**
     * Remove the specified empInfo from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $empInfo = $this->empInfoRepository->find($id);

        if (empty($empInfo)) {
            Flash::error('Emp Info not found');

            return redirect(route('empInfos.index'));
        }

        $this->empInfoRepository->delete($id);

        Flash::success('Emp Info deleted successfully.');

        return redirect(route('empInfos.index'));
    }
}
