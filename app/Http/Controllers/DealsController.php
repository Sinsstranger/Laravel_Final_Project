<?php
/**
 * Правки:
 * 1. Заменен Auth::user()->getAuthIdentifier() на Auth::id().
 * 2. Использован метод compact для более краткого и читаемого кода.
 * 3. Упрощена логика в методе update и destroy.
 * 4. Используется метод update для массового обновления данных вместо fill и save.
 * 5. Улучшена логика в методе store с использованием тернарного оператора.
 */
namespace App\Http\Controllers;

use App\Http\Requests\DealsRequest;
use App\Services\DealsServices;
use App\Services\PropertiesServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Deal;
use App\Models\Review;

class DealsController extends Controller
{
    public function __construct(protected DealsServices $dealsServices, protected PropertiesServices $propertiesServices)
    {}

    public function index(): View
    {
        $deals = $this->dealsServices->getDealsByUserId(Auth::id());
        $reviews = Review::where('author_id', Auth::id())->get();

        return view('user/deals/deals', compact(['deals', 'reviews']));
    }

    public function store(DealsRequest $request)
    {
        $save = $this->dealsServices->createDeal($request);

        return $save
            ? redirect()->route('user.deals.index')->with('success', 'Бронирование успешно создано')
            : back()->with('error', 'Не удалось создать бронирование');
    }

    public function update(Request $request, Deal $deal)
    {
        $request->validate([
            'status_id' => ['required', 'integer', 'exists:deal_statuses,id'],
        ]);

        $deal->update($request->only('status_id'));

        return back()->with($deal->wasChanged() ? 'success' : 'error', $deal->wasChanged() ? 'Информация обновлена' : 'Не удалось обновить информацию');
    }

    public function destroy(Deal $deal)
    {
        return $deal->delete()
            ? redirect()->route('user.deals.index')->with('success', 'Заявка на бронирование успешно удалена')
            : redirect()->route('user.deals.index')->with('error', 'Не удалось удалить заявку на бронирование');
    }
}
