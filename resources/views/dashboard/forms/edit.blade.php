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
                    <h2>Edit Form {{ $form->name }} </h2>

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
                        addField(type) {
                            let defaultLabel;
                            switch (type) {
                                case 'text':
                                    defaultLabel = 'Text Field';
                                    break;
                                case 'email':
                                    defaultLabel = 'Email Field';
                                    break;
                                case 'number':
                                    defaultLabel = 'Number Field';
                                    break;
                                case 'date':
                                    defaultLabel = 'Date Field';
                                    break;
                                case 'textarea':
                                    defaultLabel = 'Textarea';
                                    break;
                                case 'select':
                                    defaultLabel = 'Dropdown';
                                    break;
                                case 'checkbox':
                                    defaultLabel = 'Checkbox';
                                    break;
                                case 'radio':
                                    defaultLabel = 'Radio Button';
                                    break;
                                case 'file':
                                    defaultLabel = 'Upload File';
                                    break;

                                default:
                                    defaultLabel = 'Field';
                            }

                            const label = this.customLabel || defaultLabel;

                            const fieldData = {
                                type: type,
                                label: label,
                                required: this.isFieldRequired // set required property
                            };

                            if (type === 'select') {
                                fieldData.options = this.selectOptions.split(',').map(opt => opt.trim());
                                this.selectOptions = ''; // reset select options input
                                this.selectOptionsVisible = false; // hide the select options input
                            }

                            this.formFields.push(fieldData);
                            this.customLabel = ''; // reset custom label input
                            this.isFieldRequired = false; // reset the checkbox

                        },
                        deleteField(index) {
                            this.formFields.splice(index, 1);
                        },
                        moveFieldUp(index) {
                            if (index > 0) {
                                const temp = this.formFields[index];
                                this.formFields.splice(index, 1);
                                this.formFields.splice(index - 1, 0, temp);
                            }
                        },
                        moveFieldDown(index) {
                            if (index < this.formFields.length - 1) {
                                const temp = this.formFields[index];
                                this.formFields.splice(index, 1);
                                this.formFields.splice(index + 1, 0, temp);
                            }
                        },
                        submitForm() {
                            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                            console.log(token);
                            let dataToSend = {
                                form_fields: this.formFields,
                                name: this.name,
                                description: this.description,
                                _method: 'PATCH' // This helps Laravel understand that it's an HTTP PATCH request, even though the HTTP method is POST.
                            };

                            fetch('/api/form/' + this.form.id, {
                                    method: 'POST', // We're using POST here, but Laravel will interpret it as PATCH because of the _method field.
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'Accept': 'application/json',
                                        'X-CSRF-TOKEN': token
                                    },
                                    body: JSON.stringify(dataToSend)
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        alert('Form updated successfully!');
                                    } else {
                                        alert('Error updating the form. Please try again.');
                                    }
                                })
                                .catch(error => {
                                    console.log('Error:', error);
                                    alert('Something went wrong. Please try again.');
                                });
                        }

                    }
                }).mount("#app");
            </script>
        </div>
    </div>
@endsection
