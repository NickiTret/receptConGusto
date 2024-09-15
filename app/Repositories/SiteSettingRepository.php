<?php

namespace App\Repositories;

use App\Models\SiteSetting;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class SiteSettingRepository extends BaseRepository
{

    /**
     * @return Builder
     */
    protected function getBaseModel() : Builder
    {
        return SiteSetting::query();
    }

    public function getAll() : Collection
    {
        return $this->getBaseModel()->get();
    }

}
