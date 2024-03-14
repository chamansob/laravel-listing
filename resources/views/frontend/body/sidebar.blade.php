 <div class="sidebar">
                    <div class="widget-boxed">
                        <div class="widget-boxed-header">
                            <h4><i class="ti-briefcase padd-r-10"></i>Menu</h4>
                        </div>
                        <div class="widget-boxed-body padd-top-10 padd-bot-0">
                            <div class="side-list">
                                <ul class="category-list">
                                    <li><a href="{{ route('profile.edit') }}">Update Profile </a></li>
                                    @if(Auth::user()->coach!=null)
                                     <li><a href="{{ route('user.coach.edit') }}">Edit Coach </a></li>
                                     <li><a href="{{ route('user.coach.view',Auth::user()->coach->coach_slug) }}">View Coach  </a></li>
                                    @else
                                     <li><a href="{{ route('user.coach.add') }}">Add Coach </a></li>
                                    @endif                                   
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>