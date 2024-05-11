<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\UserJob;
use Illuminate\Http\Request;

class JobController extends Controller
{
    
    public function index() {
        $jobs = Job::orderBy('id', 'desc')->take(3)->get();
        $news = new NewsController();
        return view('jobs.index', [
            'title' => 'Home',
            'jobs' => $jobs,
            'news' => $news->list()
        ]);
    }

    public function search(Request $request) {
        $jobs = [];
        if($request->pesquisa != "") {
            $jobs = Job::where('tags', 'LIKE', '%'.$request->pesquisa.'%')->get();
        }
        return view('jobs.search', [
            'jobs' => $jobs,
            'title' => 'Pesquisar empregos'
        ]);
    }

    public function create() {
        return view('jobs.create', ['title' => 'Criar vaga']);
    }

    public function store(Request $request) {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'city' => 'required',
            'time' => 'required',
            'contract' => 'required',
            'email' => ['required', 'email'],
            'website' => 'required',
            'description' => 'required',
            'tags' => 'required'
        ]);
        $formFields['user_id'] = auth()->id();
        Job::create($formFields);        
        return redirect('/')->with('message', 'Vaga criada com sucesso');        
    }

    public function show($id) {
        $job = Job::where('id', '=', $id)->first();
        $numbers = UserJob::where('job_id', '=', $id)->count();
        $compete = false;
        $competing = UserJob::where([
            ['user_id', '=', auth()->id()],
            ['job_id', '=', $id]
        ])->count();
        if($job->user_id != auth()->id()) {
            $compete = true;
        }
        if($job) {
            return view('jobs.show', [
                'job' => $job,
                'compete' => $compete,
                'numbers' => $numbers,
                'competing' => $competing,
                'title' => 'Detalhes da vaga'
           ]);
        }
        else {
            return redirect('/users/login');
        }
    }

    public function list($id) {
        $jobs = Job::where('user_id', '=', $id)->get();
        return view('jobs.list', [
            'jobs' => $jobs,
            'title' => 'Lista de Vagas'
        ]);
    }

    public function edit($id) {
        $job = Job::where('id', '=', $id)->first();
        return view('jobs.edit', [
            'job' => $job,
            'title' => 'Editar Vaga'
        ]);
    }

    public function update(Request $request) {        
        $formFields = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'city' => 'required',
            'time' => 'required',
            'contract' => 'required',
            'email' => ['required', 'email'],
            'website' => 'required',
            'description' => 'required',
            'tags' => 'required'
        ]);
        $job = Job::where('id', '=', $request->id)->first();
        $job->update($formFields);        
        return redirect('/')->with('message', 'Vaga atualizada com sucesso');        
    }

    public function compete($id) {
        $job = Job::where('id', $id)->first();
        if($job->user_id != auth()->id()) {
            $competing = UserJob::where([
                ['user_id', '=', auth()->id()],
                ['job_id', '=', $id]
            ])->count();
            if($competing == 0) {
                $formFields['user_id'] = auth()->id();
                $formFields['job_id'] = $id;
                UserJob::create($formFields);
                return redirect('/')->with('message', 'Você agora está concorrendo a essa vaga de emprego');
            }
            else {
                UserJob::where([
                    ['user_id', '=', auth()->id()],
                    ['job_id', '=', $id]
                ])->delete();
                return redirect('/')->with('message', 'Você cancelou sua candidatura para essa vaga de emprego');
            }
        }
        else {
            return redirect('/')->with('message', 'Não pode se canditar a essa vaga');
        }
    }

    public function destroy($id) {        
        $job = Job::find($id)->first();
        $job->delete();
        return redirect('/')->with('message', 'Vaga deletada com sucesso');
    }

}
