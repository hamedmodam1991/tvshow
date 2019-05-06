<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tvshow extends Model
{
    public function updateTvshow($data)
    {
        $tvshow = $this->find($data['id']);
        if ($tvshow->user_id === auth()->user()->id)
        {
            $tvshow->name =  $data['name'];
            $tvshow->season = $data['season'];
            $tvshow->episode = $data['episode'];
            $tvshow->quote = $data['quote'];
            $tvshow->save();
            return 1;
        }

    }
}
