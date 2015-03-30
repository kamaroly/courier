  <div class="panel-body" style="font-size:14px;">
              <div class="row">
                 <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <th>{{ Lang::get('courriers.names')}}</th>
                        <td>  
                         {{ $customer->names }}
                       </td>
                      </tr>
                       <tr>
                        <th>{{ Lang::get('courriers.telephone') }}</th>
                        <td>  
                          {{ $customer->telephone }}
                       </td>
                      </tr>
                      <tr>
                        <th>{{ Lang::get('courriers.email') }}</th>
                        <td>{{ $customer->email }}</td>
                      </tr>
                      <tr>
                        <tr>
                        <th>{{ Lang::get('courriers.street_number') }}</th>
                        <td>{{ $customer->street_number }}</td>
                      </tr>
                    
                     </tbody>
                  </table>
      
                </div>
            </div>