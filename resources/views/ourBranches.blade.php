@extends('master')
@section('content')
<div class="page-content my-5">
    <!--section-->
  
    <!--//section-->
    <!--section-->
    <div class="section page-content-first">
        <div class="container">
            <div class="text-center mb-2  mb-md-3 mb-lg-4">
                <div class="h-sub theme-color">نتشرف بخدمتكم</div>
                <h1>فروعنا</h1>
                <div class="h-decor"></div>
                <div class="text-center mt-4">

                </div>
            </div>
        </div>
        <div class="container">
            <div class="row col-equalH justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="service-card">
                        <div class="service-card-photo">
                            <a href="#"><img src="{{asset('images/brancehs/1.jpg')}}" class="img-fluid" alt=""></a>
                        </div>
                        <h5 class="service-card-name"><a href="#">فرع العليا</a></h5>
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
                            <a href="#"><img src="{{asset('images/brancehs/2.jpg')}}" class="img-fluid" alt=""></a>
                        </div>
                        <h5 class="service-card-name"><a href="#">فرع البديعة</a></h5>
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
                            <a href="#"><img src="{{asset('images/brancehs/3.jpg')}}" class="img-fluid" alt=""></a>
                        </div>
                        <h5 class="service-card-name"><a href="#">فرع جدة</a></h5>
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
                            <a href="#"><img src="{{asset('images/brancehs/4.jpg')}}" class="img-fluid" alt=""></a>
                        </div>
                        <h5 class="service-card-name"><a href="#">فرع عسير</a></h5>
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
</div>
@endsection