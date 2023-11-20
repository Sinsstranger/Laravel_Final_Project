<?php

namespace App\Services;

use App\Http\Requests\DealsRequest;
use App\Models\Deal;
use App\Models\Property;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class DealsServices
{

    public function __construct(
        protected Deal $dealModel,
        protected Property $propertyModel,
    )
    {}

    public function createDeal(DealsRequest $request): Deal
    {

        $dataRelation = $request->only('rent_start_and_end', 'temporary_reg', 'guests', 'property_id', 'tenant_id', 'registration');
        $date = $this->getDateTimestamp($dataRelation['rent_start_and_end']);

        $property = $this->propertyModel->find($dataRelation['property_id']);

        if ($property->daily_rent) {
            $days = $this->getCountDays($date);
            $dataRelation['rent_costs'] = +$property->price_per_day * $days;
        } else {
            $month = $this->getCountMonth($date);
            $dataRelation['rent_costs'] = +($property->price_per_day)/30 * $month;
        }
        $dataRelation['rent_starts_at'] = new \DateTime($date[0]);
        $dataRelation['rent_ends_at'] = new \DateTime($date[1]);

        return $this->dealModel->createModel($dataRelation);
    }
    public function getDateTimestamp(string $data): array
    {
        $date = str_replace( ' ', '', $data);
        return explode('—', $date);
    }
    public function getCountDays(array $date): int
    {
        $date1 = new \DateTime($date[0]);
        $date2 = new \DateTime($date[1]);
        $day = $date1->diff($date2);
        return intval($day->format('%a'));
    }
    public function getCountMonth(array $date): int
    {
        $date1 = new \DateTime($date[0]);
        $date2 = new \DateTime($date[1]);
        $day = $date1->diff($date2);
        return intval($day->format('%a'));
    }
    public function getDealsByUserId(int $user_id): Collection
    {
        return $this->dealModel->getDealsByUserId($user_id);
    }

}
