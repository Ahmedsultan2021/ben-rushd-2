@extends('master')
@section('content')
    <div class="my-5">
        <div class="section" id="specialOffer">
            <div class="container">
                <div class="title-wrap text-center">
                    <div class="h-sub theme-color">نقدم اليكم بعض من</div>
                    <h2 class="h1"> خدماتنا للمجتمع </h2>
                    <div class="h-decor"></div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-md-4 ">
                        <div class="card shadow-all m-2" >
                            <img class="card-img-top fixed-size-image" width="100%"       src="{{ asset('images/services gallary/1.jpg') }}"
                                alt="Card image cap">
                            <div class="card-body p-2 text-right">
                                <div class="h3 " style="color: #950000; font-weight: 700" >العيادات المتنقلة
                                </div>
                                <p class="card-text">حيث تمت من خلالها زيارة العديد من المدارس الحكومية والخاصة، المؤسسات الحكومية والخاصة. قام خلالها الفريق الطبي في مركز بن رشد بإجراء العديد من فحوصات العيون المجانية وتقديم المحاضرات التثقيفية عن صحة العين</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 ">
                        <div class="card shadow-all m-2" >
                            <img class="card-img-top fixed-size-image" width="100%"     src="{{ asset('images/services gallary/2.jpg') }}"
                                alt="Card image cap">
                            <div class="card-body p-2 text-right">
                                <div class="h3 " style="color: #950000; font-weight: 700" >المعارض والمهرجانات المحلية  </div>
                                <p class="card-text">حرص مركز بن رشد خلال جميع مشاركاته المحلية في المعارض والأنشطة الإجتماعية داخل عدد من المولات  في منطقة الرياض من تقديم فحوصات مجانية وتوزيع نشرات وكتيبات توعوية خاصة بصحة العين</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 ">
                        <div class="card shadow-all m-2" >
                            <img class="card-img-top fixed-size-image" width="100%"     src="{{ asset('images/services gallary/3.jpg') }}"
                                alt="Card image cap">
                            <div class="card-body p-2 text-right">
                                <div class="h3 " style="color: #950000; font-weight: 700" >القوافل الطبية
                                </div>
                                <p class="card-text">والتي كانت تقوم بزيارت المناطق النائية وذلك بالتنسيق مع المراكز الطبية الحكومية في تلك المناطق. حيث تم خلالها إجراء العديد من الفحوصات التشخيصية داخل هذه المراكز الطبية الحكومية وتم تقديم النشرات والمحاضرات التثقيفية اللازمة لصحة العين.

                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 ">
                        <div class="card shadow-all m-2" >
                            <img class="card-img-top fixed-size-image" width="100%"     src="{{ asset('images/services gallary/4.jpg') }}"
                                alt="Card image cap">
                            <div class="card-body p-2 text-right">
                                <div class="h3 " style="color: #950000; font-weight: 700" >العمليات الخيرية
                                </div>
                                <p class="card-text">هناك تنسيق بين مركز بن رشد التخصصي للعيون وبعض مستشفيات وزارة الصحة خارج مدينة الرياض لتحويل الحالات المرضية والتي تحتاج لإجراء عمليات جراحية في العيون لمركز بن رشد، ليتم إجراء العملية لهم مجاناً، والعمليات المعقدة التي عجز عن حلها المراكز الطبية الأخرى.

                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 ">
                        <div class="card shadow-all m-2" >
                            <img class="card-img-top fixed-size-image" width="100%"     src="{{ asset('images/services gallary/5.jpg') }}"
                                alt="Card image cap">
                            <div class="card-body p-2 text-right">
                                <div class="h3 " style="color: #950000; font-weight: 700" >الدعم للجمعيات الخيرية
                                </div>
                                <p class="card-text">مركز بن رشد هو الشريك الطبي لجمعية البصريات السعودية لعام 2012 م. والشريك الطبي لجمعية مكافحة العمى السعودية لنفس العام. كما أن مركز بن رشد كان وعلى مدار الاعوام الماضية شريكاً استراتيجياً لجمعية عناية الخيرية والتي تقوم بتحويل الكثير من الحالات الخيرية لمركز بن رشد والذي بدوره يقوم بإجراء هذه الحالات بأعلى المقاييس وبأسعار رمزية لا تتعدى سعر التكلفة للمستهلكات.

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
