  <div class="panel-body" style="font-size:14px;">
              <div class="row">
                 <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <th>{{Lang::get('courriers.from')}}</th>
                        <td>  
                          <div class="pull-left">
                      
                          <strong>{{Lang::get('courriers.city')}}</strong>  {{ City::find($routedata['from_city'])->name }}
                           </div>
                          <div class="pull-right">
                          <strong>{{ Lang::get('courriers.area')}}</strong> {{ Area::find($routedata['from_area'])->name }}
                          </div>
                       </td>
                      </tr>
                       <tr>
                        <th>{{ Lang::get('courriers.to') }}</th>
                        <td>  
                          <div class="pull-left">
                      
                          <strong>{{Lang::get('courriers.city')}}</strong> {{ City::find($routedata['to_city'])->name }}
                           </div>
                          <div class="pull-right">
                          <strong>{{ Lang::get('courriers.area')}}</strong>{{ Area::find($routedata['to_area'])->name }}
                          </div>
                       </td>
                      </tr>
                      <tr>
                        <th>{{ Lang::get('courriers.courrier_type') }}</th>
                        <td>{{ $routedata['type'] }}</td>
                      </tr>
                      <tr>
                        <tr>
                        <th>{{ Lang::get('courriers.pickup_date') }} </th>
                        <td>{{ $routedata['pickup_date'] }}</td>
                      </tr>
                      <tr>
                        <th>{{ Lang::get('courriers.pickup_time')}}</th>
                       <td>{{ $routedata['pickup_time'] }}</td>
                      </tr>
                       <tr>
                        <th>{{ Lang::get('courriers.other_details')}}</th>
                       <td>{{ $routedata['details'] }}</td>
                      </tr>
                     </tbody>
                  </table>
                 
                </div>
            </div>