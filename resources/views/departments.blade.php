@extends('master')
@section('content')

<div class="page-content">
   
    <div class="section" id="specialOffer">
        <div class="container">
            <div class="title-wrap text-center">
                <div class="h-sub theme-color">For Our Dear Clients</div>
                <h2 class="h1">Special Offers</h2>
                <div class="h-decor"></div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="special-card">
                        <div class="special-card-photo">
                            <img src="images/content/special-photo-01.jpg" alt="">
                        </div>
                        <div class="special-card-caption text-left">
                            <div class="special-card-txt1">New Patient</div>
                            <div class="special-card-txt2">Offer</div>
                            <div class="special-card-txt3">Full Consultation
                                <br> Scale & Polish</div>
                            <div><a href="schedule.html" class="btn"><i class="icon-right-arrow"></i><span>Schedule</span><i class="icon-right-arrow"></i></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="special-card">
                        <div class="special-card-photo">
                            <img src="images/content/special-photo-02.jpg" alt="">
                        </div>
                        <div class="special-card-caption text-left">
                            <div class="special-card-txt1">Free</div>
                            <div class="special-card-txt2">Consultation</div>
                            <div class="special-card-txt3">Contact us to find out more about this offer</div>
                            <div><a href="contact.html" class="btn"><i class="icon-right-arrow"></i><span>Contact us</span><i class="icon-right-arrow"></i></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="special-card">
                        <div class="special-card-photo">
                            <img src="images/content/special-photo-03.jpg" alt="">
                        </div>
                        <div class="special-card-caption text-left">
                            <div class="special-card-txt1">Whitening</div>
                            <div class="special-card-txt2">Laser Teeth</div>
                            <div class="special-card-txt3">
                                Tooth whitening<br>and Home Bleaching</div>
                            <div><a href="services.html" class="btn"><i class="icon-right-arrow"></i><span>Know more</span><i class="icon-right-arrow"></i></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="special-card">
                        <div class="special-card-photo">
                            <img src="images/content/special-photo-04.jpg" alt="">
                        </div>
                        <div class="special-card-caption text-left">
                            <div class="special-card-txt1">Porcelain</div>
                            <div class="special-card-txt2">Veneer</div>
                            <div class="special-card-txt3">6 Teeth or more in the same
                                <br>jaw, upper or lower front</div>
                            <div><a href="service-page.html" class="btn"><i class="icon-right-arrow"></i><span>Know more</span><i class="icon-right-arrow"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--//section special offers-->
</div>

{{-- 
<div class="page-content my-5">
  
    <div class="section page-content-first">
        <div class="container">
            <div class="text-center mb-2  mb-md-3 mb-lg-4">
                <div class="h-sub theme-color">نتشرف بخدمتكم</div>
                <h1>فروعنا</h1>
                <div class="h-decor"></div>
            
            </div>
        </div>
        <div class="container">
            <div class="row col-equalH justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="service-card">
                        <div class="service-card-photo">
                            <a href="{{route('reportpage')}}"><img src="{{asset('images/brancehs/1.jpg')}}" class="img-fluid" alt=""></a>
                        </div>
                        <h5 class="service-card-name"><a href="{{route('reportpage')}}">فرع العليا</a></h5>
                        <div class="h-decor"></div>
                        <p>Cancer care includes a variety of treatments, systematic therapies, surgery and clinical trials.</p>
                        <ul class="marker-list-md-line">
                            <li>Chemotherapy</li>
                            <li>Hormone therapy</li>
                            <li>Immunotherapy</li>
                            <li>Precision genomics</li>
                            <li>Radiation oncology</li>
                            <li>Surgical oncology</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="service-card">
                        <div class="service-card-photo">
                            <a href="{{route('reportpage')}}"><img src="{{asset('images/brancehs/2.jpg')}}" class="img-fluid" alt=""></a>
                        </div>
                        <h5 class="service-card-name"><a href="{{route('reportpage')}}">فرع البديعة</a></h5>
                        <div class="h-decor"></div>
                        <p>Treatment for the most complex, advanced heart, lung, and vascular disease problems.</p>
                        <ul class="marker-list-md-line">
                            <li>The Advanced Lipid</li>
                            <li>The Aortopathy Screening</li>
                            <li>Sports Cardiology</li>
                            <li>Vascular Regenerative Medicine</li>
                            <li>Heart and Vascular Clinical Trials</li>
                            <li>Carotid Stent</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="service-card">
                        <div class="service-card-photo">
                            <a href="{{route('reportpage')}}"><img src="{{asset('images/brancehs/3.jpg')}}" class="img-fluid" alt=""></a>
                        </div>
                        <h5 class="service-card-name"><a href="{{route('reportpage')}}">فرع جدة</a></h5>
                        <div class="h-decor"></div>
                        <p>Your child will receive state-of-the-art oral care from our team</p>
                        <ul class="marker-list-md-line">
                            <li>Epilepsy</li>
                            <li>Movement disorders</li>
                            <li>Autoimmune neurology</li>
                            <li>Pediatric neurology</li>
                            <li>Neurophysiology</li>
                            <li>Headache</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="service-card">
                        <div class="service-card-photo">
                            <a href="{{route('reportpage')}}"><img src="{{asset('images/brancehs/4.jpg')}}" class="img-fluid" alt=""></a>
                        </div>
                        <h5 class="service-card-name"><a href="{{route('reportpage')}}">فرع عسير</a></h5>
                        <div class="h-decor"></div>
                        <p>Neurosurgery treats conditions that affect the brain, spine and nerves, including aneurysms, tumors and injuries.</p>
                        <ul class="marker-list-md-line">
                            <li>Brain Tumors</li>
                            <li>Cerebral Aneurysm</li>
                            <li>Intracerebral Hemorrhage</li>
                            <li>Skull and Spine Fractures</li>
                            <li>Head Injury</li>
                        </ul>
                    </div>
                </div>
              
            </div>
        </div>
    </div>
    <!--//section-->
</div> --}}

    
@endsection