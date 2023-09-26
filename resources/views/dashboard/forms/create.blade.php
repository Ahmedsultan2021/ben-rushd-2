@extends('dashboardMaster')
@section('content')
    <div class="content-wrapper">

        <div class="bg-light p-5">
            <div id="app" class="container">
                <div class="d-flex justify-content-end">
                    <a name="" id="" class="btn btn-dark" href="{{route('listforms')}}" role="button">list all Forms</a>
                </div>
                <div class="mb-4">
                    <h2 class="my-5" >منشئ النموذج</h2>

                    <input v-model="name" placeholder="ادخل اسم النموذج" class="form-control mb-2">
                    <input v-model="description" placeholder="ادخل وصف النموذج" class="form-control mb-2">
                    <input v-model="customLabel" placeholder="اسم حقل الادخال (label)" class="form-control mb-2">

                    <div v-if="selectOptionsVisible">
                        <input v-model="selectOptions" placeholder="Options (comma separated)" class="form-control mb-2">
                        <button @click="addField('select')" class="btn btn-info mb-2">Add Options & Create Dropdown</button>
                    </div>

                    <!-- Checkbox for Required Field -->
                    <div class="mb-3">
                        <label for="requiredCheckbox" class="form-label mx-2">مطلوب</label>
                        <input type="checkbox" v-model="isFieldRequired" id="requiredCheckbox" class="me-2">
                    </div>

                    <div class="d-flex flex-wrap justify-content-center " style="gap: 2px; ">
                      <div style="max-width: 600px; gap: 3px" class="d-flex flex-wrap justify-content-center"  >
                          
                          <button @click="addField('text')" class="btn btn-dark me-2">Add Text Field</button>
                          <button @click="addField('email')" class="btn btn-dark me-2">Add Email Field</button>
                          <button @click="addField('number')" class="btn btn-dark me-2">Add Number Field</button>
                          <button @click="addField('date')" class="btn btn-dark me-2">Add Date Field</button>
                          <button @click="addField('textarea')" class="btn btn-dark me-2">Add Textarea</button>
                          <button @click="() => { selectOptionsVisible = true; }" class="btn btn-dark me-2">Prepare
                              Dropdown</button>
                          <button @click="addField('checkbox')" class="btn btn-dark me-2">Add Checkbox</button>
                          <button @click="addField('radio')" class="btn btn-dark me-2">Add Radio Button</button>
                          <button @click="addField('file')" class="btn btn-dark me-2">Add File Field</button>
                      </div>
                    </div>
                </div>
                <!-- Generated Form Preview -->
                <div class="border p-4 bg-white">
                    <h2 class="mb-4">Form Preview</h2>
                    <div v-for="(field, index) in formFields" class="mb-3 align-items-center">
                        <div class="row">
                            <div class="col-md-3">
                                
                                <label :for="'field_' + index" class="form-label me-2">@{{ field.label }}</label>
                            </div>
                            <div class="col-md-6 d-flex">

                                <input v-if="['text', 'email', 'number', 'date'].includes(field.type)" :type="field.type"
                                    :id="'field_' + index" class="form-control me-2" :placeholder="'Enter your ' + field.type">
        
                                <textarea v-if="field.type === 'textarea'" :id="'field_' + index" class="form-control me-2"
                                    :placeholder="'Enter your ' + field.type"></textarea>
        
                                <select v-if="field.type === 'select'" :id="'field_' + index" class="form-control me-2">
                                    <option v-for="option in field.options" :value="option">@{{ option }}</option>
                                </select>
        
                                <input v-if="field.type === 'checkbox'" type="checkbox" :id="'field_' + index" class="me-2">
        
                                <input v-if="field.type === 'radio'" type="radio" :name="'field_' + index" class="me-2">
                                <!-- ... other field types ... -->
                                <input v-if="field.type === 'file'" type="file" :id="'field_' + index"
                                    class="form-control me-2">
        
                                <button @click="moveFieldUp(index)" class="btn btn-light btn-sm me-2"><i class="fas fa-arrow-up"></i></button>
                                <button @click="moveFieldDown(index)" class="btn btn-light btn-sm me-2"><i class="fas fa-arrow-down"></i></button>
                                <button @click="deleteField(index)" class="btn btn-danger btn-sm"><i class="fas fa-window-close"></i></button>
                            </div>
                        </div>

                    </div>
                    <button @click="submitForm" class="btn btn-success">Submit</button>

                </div>
            </div>


            <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


            <!-- Vue.js and app.js script will be added in the subsequent steps -->
            <script>
                const app = Vue.createApp({
                    data() {
                        return {
                            formFields: [],
                            customLabel: '', // to bind the input for custom labels
                            selectOptions: '', // to bind the input for custom select options
                            selectOptionsVisible: false,
                            isFieldRequired: false,
                            name: '',
                            description:'',

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
                 
                            let dataToSend = {
                                form_fields: this.formFields,
                                name: this.name,
                                description: this.description,
                            };
                            fetch('/api/form', {
                                    method: 'POST',
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
                                        alert('Form saved successfully!');
                                    } else {
                                        alert('Error saving the form. Please try again.');
                                    }
                                    console.log(dataToSend)
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
