@extends('dashboardMaster')
@section('content')
    <div class="content-wrapper">

        <div class="bg-light p-5">
            <div id="app" class="container">
                <div class="d-flex justify-content-end">
                    <a name="" id="" class="btn btn-dark" href="{{ route('listforms') }}" role="button">list all
                        Forms</a>
                </div>
                <div class="mb-4">
                    <h2>Form Builder</h2>

                    <input v-model="name" placeholder="add your form name" class="form-control mb-2">
                    <input v-model="description" placeholder="Enter your form description" class="form-control mb-2">
                    <input v-model="customLabel" placeholder="Custom Label (optional)" class="form-control mb-2">

                    <div v-if="selectOptionsVisible">
                        <input v-model="selectOptions" placeholder="Options (comma separated)" class="form-control mb-2">
                        <button @click="addField('select')" class="btn btn-info mb-2">Add Options & Create Dropdown</button>
                    </div>

                    <!-- Checkbox for Required Field -->
                    <div class="mb-3 ">
                        <input type="checkbox" v-model="isFieldRequired" id="requiredCheckbox" class="me-2">
                        <label for="requiredCheckbox" class="form-label">Required</label>
                    </div>

                    <div class="d-flex flex-wrap justify-content-center" style="gap: 2px">
                        <button @click="addField('text')" class="btn btn-primary me-2">Add Text Field</button>
                        <button @click="addField('email')" class="btn btn-primary me-2">Add Email Field</button>
                        <button @click="addField('number')" class="btn btn-primary me-2">Add Number Field</button>
                        <button @click="addField('date')" class="btn btn-primary me-2">Add Date Field</button>
                        <button @click="addField('textarea')" class="btn btn-primary me-2">Add Textarea</button>
                        <button @click="() => { selectOptionsVisible = true; }" class="btn btn-primary me-2">Prepare
                            Dropdown</button>
                        <button @click="addField('checkbox')" class="btn btn-primary me-2">Add Checkbox</button>
                        <button @click="addField('radio')" class="btn btn-primary me-2">Add Radio Button</button>
                        <button @click="addField('file')" class="btn btn-primary me-2">Add File Field</button>
                    </div>
                </div>
                <!-- Generated Form Preview -->
                <div class="border p-4 bg-white">
                    <h2 class="mb-4">Form Preview</h2>
                    <div v-for="(field, index) in formFields" class="mb-3 d-flex align-items-center">
                        <label :for="'field_' + index" class="form-label me-2">@{{ field.label }}</label>

                        <input v-if="['text', 'email', 'number', 'date'].includes(field.type)" :type="field.type"
                            :id="'field_' + index" class="form-control me-2" :placeholder="'Enter your ' + field.type">

                        <textarea v-if="field.type === 'textarea'" :id="'field_' + index" class="form-control me-2"
                            :placeholder="'Enter your ' + field.type"></textarea>

                        <select v-if="field.type === 'select'" :id="'field_' + index" class="form-select me-2">
                            <option v-for="option in field.options" :value="option">@{{ option }}</option>
                        </select>

                        <input v-if="field.type === 'checkbox'" type="checkbox" :id="'field_' + index" class="me-2">

                        <input v-if="field.type === 'radio'" type="radio" :name="'field_' + index" class="me-2">
                        <!-- ... other field types ... -->
                        <input v-if="field.type === 'file'" type="file" :id="'field_' + index"
                            class="form-control me-2">


                        <!-- Move Up & Down and Delete Buttons -->
                        <button @click="moveFieldUp(index)" class="btn btn-light btn-sm me-2">🔼</button>
                        <button @click="moveFieldDown(index)" class="btn btn-light btn-sm me-2">🔽</button>
                        <button @click="deleteField(index)" class="btn btn-danger btn-sm">❌</button>
                    </div>
                    {{-- <button onclick="showAlert()">Click Me</button> --}}

                    <button @click="submitForm" class="btn btn-success">Submit</button>
                </div>
            </div>


            <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>

            <!-- Vue.js and app.js script will be added in the subsequent steps -->
            <script>
                window.form = @json($form);
                window.formFields = @json($formFields);
                console.log(window.form);
                console.log(window.formFields);

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
                            form: window.form || {}
                        };
                    },
                    methods: {
          
                        async submitForm() {
                            const fieldResponses = this.formFields.map(field => ({
                                form_field_id: field.id,
                                value: field.value
                            }));

                            try {
                                const response = await fetch('/api/form_responses', {
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

                                alert('Form submitted successfully');
                            } catch (error) {
                                alert('Error submitting form: ' + error);
                            }
                        },
                    }
                }).mount("#app");
            </script>

        </div>
    </div>
@endsection
