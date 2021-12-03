<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use Illuminate\Http\Request;
use App\Http\Resources\JournalsResource;

class JournalsController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$journals = Journal::all();
		$noIssues = [];
		$noPages = [];
		$startDate = [];
		$endDate = [];
		$dataTermino = [];
		foreach ($journals as $journal)
		{
			$issues = Issue::where('journal_id', $journal->id);
			$noIssues[$journal->id] = $issues->count();

			$startDate[$journal->id] = $issues->first() ? $issues->orderBy('start_date', 'asc')->first()->start_date->format('d/m/Y') : '-';
			$issues = Issue::where('journal_id', $journal->id);
			$endDate[$journal->id] = $issues->first() ? $issues->orderBy('end_date', 'desc')->first()->end_date->format('d/m/Y') : '-';
			$noPages[$journal->id] = null;
			$issues = Issue::where('journal_id', $journal->id)->get();

			foreach ($issues as $issue)
			{
				$noPages[$journal->id] += $issue->number_pages;
			}
		}

		return [
				'journals' => $journals,
				'noIssues' => $noIssues,
				'noPages' => $noPages,
				'startDate' => $startDate,
				'endDate' => $endDate,
			];
		
		// return JournalsResource::collection(Journal::all());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request, Journal $journal)
	{
		$journal = $journal->create($request->all());

		return new JournalsResource($journal);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Journal  $journal
	 * @return \Illuminate\Http\Response
	 */
	public function show(Journal $journal)
	{
		return new JournalsResource($journal);
	}

	public function getJournalYears(Journal $journal)
	{
		$years = [];

		foreach ($journal->issues()->get() as $issue)
		{
			$year = $issue->start_date->format('Y');
			if (!in_array($year, $years))
			{
				array_push($years, $year);
			}
		}

		sort($year);

		return json_encode([
			'journal' => $journal,
			'years' => $years,
			'months' => [],
		]);
	}

	public function getYearMonthsJournals(Journal $journal, string $year)
	{
		//Obter lista de monthes disponíveis para um year de um periódico

		$date = \Carbon\Carbon::createFromDate($year,null,null);
		$startYear = $date->copy()->startOfYear();
		$endYear = $data->copy()->endOfYear();
		$months = [];

		$yearIssues = $journal->issues()->where('start_date', '>=', $startYear)->where('end_date', '<=', $endYear)->get();
		
		foreach ($yearIssues as $issue)
		{
			$monthLabel = '';
			$startMonth = $issue->start_date->format('m');
			$endMonth = $issue->end_date->format('m');
			if ($startMonth == $endMonth)
			{
				$monthLabel = $startMonth;
			}
			else
			{
				$monthLabel = $startMonth . '-' . $endMonth;
			}
			if (!in_array($monthLabel, $months))
			{
				array_push($months, $monthLabel);
			}
		}

		sort($months);

		return json_encode([
			'months' => $months,
			'year' => $year,
			'journal' => $journal->id
		]);
	}

	public function getMonthJournals(Journal $journal, string $year, string $month)
	{
		//Obter lista de monthes disponíveis para um year de um periódico

		$date = \Carbon\Carbon::createFromDate($year, $month, null);
		$startMonth = $date->copy()->startOfMonth();
		$monthEnd = $date->copy()->endOfMonth();
		$days = [];
		$response = [];
		$monthIssues = $journal->issues()->where('start_date', '>=', $startMonth)->where('end_date', '<=', $monthEnd)->get();

		if ($monthIssues->count())
		{
			foreach ($monthIssues as $issue)
			{
				$day = $issue->start_date->format('d');
				if (!in_array($day, $days))
				{
					array_push($days, $day);
				}
			}
			sort($days);

			$response = [
				'days' => $days,
				'month' => $month,
				'year' => $year,
				'journal' => $journal->id
			];
		}
		else
		{
			$issue = $journal->issues()->where('start_date', '=', $startMonth)->first();
			$day = $issue->start_date->format('d');

			if (!in_array($day, $days))
			{
				array_push($days, $day);
			}
			sort($days);

			$response = [
				'days' => $days,
				'month' => $month,
				'year' => $year,
				'journal' => $journal->id
			];
		}

		return json_encode($response);
	}
	
	public function getJournalIssue(Journal $journal, string $year, string $month, string $day)
	{
		//Obter arquivos da edição

		$date = \Carbon\Carbon::createFromDate($year, $month, $day)->format('Y-m-d');
		$issue = $journal->issues()->where('start_day', '=', $date)->first();
		$pages = [];

		foreach ($issue->pages as $page)
		{
			$page = $page->numero;
			if (!in_array($page, $pages))
			{
				array_push($pages, $page);
			}
		}
		sort($pages);

		return json_encode([
			'pages' => $pages,
			'issue' => $issue->id,
			'journal' => $journal->id
		]);
	}

	public function obterjournalPage(Issue $issue, string $page)
	{
		$pages = [];
		$page = Page::where('issue_id', $issue->id)->where('numero', $page)->first();
		$journal = $issue->journal()->first();
		$imgHeader = $issue->start_date->format('d-m-Y') . ' - ' . ' Página ' . $page->page_number;
		$pagePath = asset('acervo/biblioweb/' . $page->filepath);

		return json_encode([
			// 'pagePath' => 'https://firebasestorage.googleapis.com/v0/b/bibioweb-storage.appspot.com/o/31%2F02.jpg?alt=meday&token=f2f819eb-9d22-416d-8025-11fff22e2da5',
			'pagePath' => $pagePath,
			'img_header' => $imgHeader,
			'start_date' => $issue->start_date,
			'end_date' => $issue->end_date,
			'number_pages' => $issue->number_pages,
		]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Journal  $journal
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Journal $journal)
	{
		return new JournalsResource($journal);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Journal  $journal
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Journal $journal)
	{
		$journal->update($request->all());

		return new JournalsResource($journal);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Journal  $journal
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Journal $journal)
	{
		$journal->delete();
		return response(null, 204);
	}
}
