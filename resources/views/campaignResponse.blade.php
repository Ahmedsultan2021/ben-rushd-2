@extends('master')
@section('content')
    <div class="my-5">


        <div class="page-content" style="direction: rtl; text-align: start">
            <div class="container mt-5">
                <div class="row">
                    <div class="col text-center">
                        <h1>Offer Countdown</h1>
                        <div id="countdown" data-deadline="{{ $campaign->endTime }}"
                            class="d-flex justify-content-center flex-wrap ">
                            <div class="mr-3 mb-1">
                                <span id="days"></span> Days
                            </div>
                            <div class="mr-3 mb-1">
                                <span id="hours"></span> Hours
                            </div>
                            <div class="mr-3 mb-1">
                                <span id="minutes"></span> Minutes
                            </div>
                            <div class="mr-3 mb-1">
                                <span id="seconds"></span> Seconds
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    {{-- <div class="col text-center mt-5" >
                    {{$campaign->title}}
                </div> --}}
                </div>
            </div>
            <div class="section">
                <div class="container">
                    <div class="row">
                        <div class="col-md col-lg-5">
                            <div class="pr-0 pr-lg-8">
                                <div class="title-wrap">
                                    <h1> العنوان
                                    </h1>
                                    <h2> عرض خاص ولفترة محدودة </h2>
                                    <div class="h-decor"></div>
                                </div>
                                <div class="mt-2 mt-lg-4">
                                    <p>العرض فقط للاعمار من 18 الى 40</p>
                                    <p>تطبق الشروط والأحكام | سياسة الخصوصية</p>
                                    <p class="p-sm">Fields marked with a * are required.</p>
                                </div>
                                <div class="mt-2 mt-md-5"></div>
                                <h5>Stay Connected</h5>
                                <div class="content-social mt-15">
                                    <a href="https://www.facebook.com/" target="blank" class="hovicon"><i
                                            class="icon-facebook-logo"></i></a>
                                    <a href="https://www.twitter.com/" target="blank" class="hovicon"><i
                                            class="icon-twitter-logo"></i></a>
                                    <a href="https://plus.google.com/" target="blank" class="hovicon"><i
                                            class="icon-google-logo"></i></a>
                                    <a href="https://www.instagram.com/" target="blank" class="hovicon"><i
                                            class="icon-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md col-lg-6 mt-4 mt-md-0">
                            @if (session('success'))
                                <label>
                                    <input type="checkbox" class="alertCheckbox" autocomplete="off" />
                                    <div class="alert success">
                                        <span class="alertText"> {{ session('success') }}

                                            <br class="clear" /></span>
                                    </div>
                                </label>
                            @endif


                            <div id="app" class="container">

                                <!-- Generated Form Preview -->
                                <div class="bg-white" v-if="unsubmit">
                                    <div v-for="(field, index) in formFields" class="mb-3 align-items-center">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label :for="'field_' + index" class="form-label"
                                                    style="font-weight: 900">@{{ field.label }}</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input v-if="['text', 'email', 'number', 'date'].includes(field.type)"
                                                    :type="field.type" :id="'field_' + index" class="form-control"
                                                    :placeholder="'Enter your ' + field.label" v-model="field.value">
                                                <!-- Added v-model -->

                                                <textarea v-if="field.type === 'textarea'" :id="'field_' + index" class="form-control"
                                                    :placeholder="'Enter your ' + field.label" v-model="field.value"></textarea> <!-- Added v-model -->

                                                <select v-if="field.type === 'select'" :id="'field_' + index"
                                                    class="form-control" v-model="field.value"> <!-- Added v-model -->
                                                    <option v-for="option in field.options" :value="option">
                                                        @{{ option }}</option>

                                                </select>

                                                <input v-if="field.type === 'checkbox'" type="checkbox"
                                                    :id="'field_' + index" class="me-2" v-model="field.value">
                                                <!-- Added v-model -->

                                                <input v-if="field.type === 'radio'" type="radio" :name="'field_' + index"
                                                    class="" v-model="field.value"> <!-- Added v-model -->

                                                <input v-if="field.type === 'file'" type="file" :id="'field_' + index"
                                                    class="form-control" v-model="field.value"> <!-- Added v-model -->
                                            </div>
                                        </div>
                                    </div>
                                    <button @click="submitForm" class="btn btn-success">Submit</button>
                                </div>
                                <div v-else >
                                    <h2 >تم التسجيل بنجاح</h2> 
                                    <p>سيتم التواصل معك في أقرب وقت</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <section class="section">
                {{-- <img src="{{ asset('images/offers') }}/{{ $offer->image }}"width="70%" class="d-block m-auto" alt=""> --}}
            </section>
        </div>

    </div>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script>
        window.form = @json($form);
        window.formFields = @json($formFields);


        const app = Vue.createApp({
            data() {
                return {
                    formFields: window.formFields || [],
                    customLabel: '', // to bind the input for custom labels
                    selectOptions: '', // to bind the input for custom select options
                    selectOptionsVisible: false,
                    isFieldRequired: false,
                    name: window.form.name || '',
                    description: window.form.description || '',
                    form: window.form || {},
                    unsubmit: true
                };
            },
            methods: {
                async submitForm() {
                    let isValid = true;

                    // Validate each field for required data
                    this.formFields.forEach(field => {
                        if (field.required === 1) {
                            if (field.value === null || field.value === '' || typeof field.value ===
                                'undefined') {
                                isValid = false;
                            }
                        }
                    });

                    if (!isValid) {
                        Swal.fire(
                            'Validation Failed!',
                            'Please fill in all required fields before submitting.',
                            'warning'
                        );
                        return;
                    }

                    const fieldResponses = this.formFields.map(field => ({
                        form_field_id: field.id,
                        value: field.value
                    }));

                    try {
                        const response = await fetch('/api/formResponse', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                form_id: this.form.id,
                                field_responses: fieldResponses
                            })
                        });

                        if (!response.ok) {
                            throw new Error(`HTTP error ${response.status}`);
                        }
                        this.unsubmit = false

                        Swal.fire(
                            'Success!',
                            'Form submitted successfully',
                            'success'
                        );
                    } catch (error) {
                        Swal.fire(
                            'Failed!',
                            'Error submitting form: ' + error,
                            'error'
                        );
                    }
                }


            }
        }).mount("#app");
    </script>
@endsection
