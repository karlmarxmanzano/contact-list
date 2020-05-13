<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Contact extends Model implements Searchable
{

    protected $fillable = [
      'first_name',
      'last_name',
      'email',
      'contact_number'
    ];

    public function getSearchResult(): SearchResult
     {
        $url = route('contacts.show', $this);
     
         return new \Spatie\Searchable\SearchResult(
            $this,
            $this->first_name,
            $url
         );
     }
}
