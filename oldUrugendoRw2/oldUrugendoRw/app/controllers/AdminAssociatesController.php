<?php

class AdminAssociatesController extends \BaseController {

	 public function getIntroducer()
    {
        $data = ['id'   =>  1,'value'   =>  'Kamaro',
        'id'  =>  1,'value'   =>  'Kamaro',
        'id'  =>  1,'value'   =>  'Kamaro'];
    }
    
    public function getRanklist()
    {
        $get_rank_id = Input::get('rank_id');
        $ranklist    = Rank::select('id', 'rankname')->where('rank_no', '<=', $get_rank_no)->get();

        return $ranklist;
    }

}
