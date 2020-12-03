<template>
    <div class="tab-pane active">
        <div class="panel-group">
            <div class="panel panel-default lgx-panel">
                <div class="panel-heading">
                    <form ref="form" @submit.prevent="validateForm" method="POST" enctype="multipart/form-data" class="lgx-contactform">
                        <input type="hidden" name="event_id" v-model="event_id">
                       
                        <input type="hidden" name="organiser_id" v-model="organiser_ids" v-validate="(is_admin ? 'required' : '')" >

                        <!-- it is display in create case and when organiser_id is null -->
                        <div class="form-group" v-if="organisers.length > 0">
                            <label>  {{ trans('em.organiser') }}</label>
                            <div v-if="!organiser_id">
                                <v-select 
                                    label="name" 
                                    class="style-chooser" 
                                    :placeholder="trans('em.search_organiser')+' '+trans('em.email')+'/'+trans('em.name')"
                                    v-model="organizer" 
                                    :required="!organizer" 
                                    :filterable="false" 
                                    :options="options" 
                                    @search="onSearch" 
                                ><div slot="no-options">{{ trans('em.organiser_not_found') }} </div></v-select>
                            </div>

                              <!-- it is display in edit case and when organiser_id is   -->
                            <input v-if="organiser_id" readonly type="text"  class="form-control" :value="organizer.name+'  ( '+organizer.email+' )'">
                                
                            <span v-show="errors.has('organiser_id')" class="help text-danger">{{ errors.first('organiser_id') }}</span>
                            
                        </div>
    
                        <div class="form-group">
                            <label>{{ trans('em.select_category') }}</label>
                            <select name="category_id" class="form-control" v-model="category_id" v-validate="'required|decimal|is_not:0'">
                                <option value="0">-- {{ trans('em.category') }} --</option>
                                <option v-for="(category, index) in categories" :key = "index" :value="category.id">{{category.name}}</option>
                            </select>
                            <span v-show="errors.has('category_id')" class="help text-danger">{{ errors.first('category_id') }}</span>    
                        </div>
                        
                        <div class="form-group">
                            <label>{{ trans('em.event_name') }}</label>
                            <input type="text" class="form-control"  name="title" v-model="title" v-validate="'required'">
                            <span v-show="errors.has('title')" class="help text-danger">{{ errors.first('title') }}</span>
                        </div>

                        
                        <div class="form-group">
                            <label>{{ trans('em.event_url') }}</label>
                            <input type="hidden" name="slug" v-model="slug" v-validate="'required'">
                            <p class="help">{{ slugUrl() }}</p>
                        </div>

                        <div class="form-group">
                            <label>{{ trans('em.description') }}</label>
                            <textarea class="form-control"  rows="3" name="description" :value="description" v-validate="'required'" style="display:none;"></textarea>
                            <ckeditor  v-model="description" ></ckeditor>
                            <span v-show="errors.has('description')" class="help text-danger">{{ errors.first('description') }}</span>
                        </div>

                        <div class="form-group">
                            <label>{{ trans('em.more_event_info') }} </label>
                            <textarea class="form-control" rows="3" name="faq" :value="faq" style="display:none;"></textarea>
                            <ckeditor v-model="faq"></ckeditor>
                            <span v-show="errors.has('faq')" class="help text-danger">{{ errors.first('faq') }}</span>
                        </div>

                        <div class="form-group" v-if="is_admin">
                            <input type="checkbox" class="custom-control-input" :value=1 name="featured" v-model="featured" >
                            <label class="custom-control-label" >{{ trans('em.event_featured') }}</label>
                        </div>

                        <div class="form-group" v-if="is_admin">
                            <input type="checkbox" class="custom-control-input" :value=1 name="status" v-model="status" >
                            <label class="custom-control-label" >{{ trans('em.event_status') }}</label>
                        </div>
                        
                        <button type="submit" class="btn lgx-btn btn-block"><i class="fas fa-sd-card"></i> {{ trans('em.save') }}</button>
                    </form>                
                    
                </div>
            </div>
        </div>

        
        
    </div>
</template>

<script>



import { mapState, mapMutations} from 'vuex';

import CKEditor from 'ckeditor4-vue';

import mixinsFilters from '../../mixins.js';
import VueSelect from 'vue-select';

export default {
    
        
    props: [
        'organisers', 'is_admin', 'event_ck', 'selected_organiser'
    ],
    mixins:[
        mixinsFilters
    ],

    components: {
        ckeditor: CKEditor.component,
        'v-select' : VueSelect
        
    },

    data() {
        return {

            title           : null,
            organiser_ids   : null,
            categories      : [],
            description     : this.event_ck.description,
            faq             : this.event_ck.faq,
            category_id     : 0,
            featured        : 0,
            status          : 0,

            // organizers options
            options         : this.organisers,
            //selected organizer
            organizer       : this.selected_organiser
        }
    },

    computed: {
        // get global variables
        ...mapState( ['event_id', 'organiser_id', 'event']),
        
        slug: function() {
            if(this.title != null)
            {
                var slug = this.sanitizeTitle(this.title);
                return slug;
            }
        }
    },

    methods: {

        // update global variables
        ...mapMutations(['add', 'update']),

        editEvent( editor ) {
            
            if(Object.keys(this.event).length > 0)
            {
                this.title          = this.event.title;
                this.category_id    = this.event.category_id;
                this.organiser_ids  = this.organiser_id ;
                this.featured       = this.event.featured; 
                this.status         = this.event.status;
            }    
            
            
        },

        // validate data on form submit
        validateForm(event) {
            this.$validator.validateAll().then((result) => {
                if (result) {
                    this.formSubmit(event);            
                }
            });
        },

        // show server validation errors
        serverValidate(serrors) {
            this.$validator.validateAll().then((result) => {
                this.$validator.errors.add(serrors);
            });
        },

        // submit form
        formSubmit(event) {
            // prepare form data for post request
            let post_url = route('eventmie.myevents_store');
            let post_data = new FormData(this.$refs.form);
            
            // axios post request
            axios.post(post_url, post_data)
            .then(res => {
                // on success
                // use vuex to update global sponsors array
                if(res.data.status)
                {
                    // fill data to global sponsors array
                    this.add({  
                        event_id        : res.data.id,
                        organiser_id    : res.data.organiser_id , 
                    });
                    this.showNotification('success', trans('em.event_save_success'));
                    
                    if(res.data.slug)
                    {   
                        //create case redirect with slug
                        setTimeout(function() {
                            window.location = route('eventmie.myevents_form',[res.data.slug]);
                        }, 1000);
                    }
                }    

            })
            .catch(error => {
                let serrors = Vue.helpers.axiosErrors(error);
                if (serrors.length) {
                    this.serverValidate(serrors);
                }
            });
        },

        getCategories(){
            let post_url = route('eventmie.myevents_categories');
            
            // axios post request
            axios.get(post_url)
            .then(res => {
                
                if(res.data.status)
                {
                    this.categories = res.data.categories;
                }
                
            })
            .catch(error => {
                let serrors = Vue.helpers.axiosErrors(error);
                if (serrors.length) {
                    this.serverValidate(serrors);
                }
            });
        },

        // slug route
        slugUrl(){
            if(this.slug != null)
                return route('eventmie.events_index').url()+'/'+this.slug;

            return '';
        },

        // get organizers

        getOrganizers(loading, search = null){
            var postUrl     = route('eventmie.get_organizers');
            var _this       = this;
            axios.post(postUrl,{
                'search' :search,
            }).then(res => {
                
                var promise = new Promise(function(resolve, reject) { 
                    _this.options = res.data.organizers;
                    resolve(true);
                }) 
                
                promise 
                    .then(function(successMessage) { 
                        loading(false);
                    }, function(errorMessage) { 
                    //error handler function is invoked 
                        console.log(errorMessage); 
                    }) 
            })
            .catch(error => {
                let serrors = Vue.helpers.axiosErrors(error);
                if (serrors.length) {
                    this.serverValidate(serrors);
                }
            });
        },
        
        // v-select methods
        onSearch(search, loading) {
            loading(true);
            this.search(loading, search, this);
        },

        // v-select methods
        search: _.debounce((loading, search, vm) => {
            
            if(search.length > 0)
                vm.getOrganizers(loading, search);
            else
                loading(false);    
            
        }, 350)


    },

    mounted(){
        
        if(this.categories.length == 0)
            this.getCategories();
        
        if(this.event_id) {
            var $this = this;
            
            this.getMyEvent().then(function (response){
                $this.editEvent();  
            });
            
        };
    },

    watch: {
        // active when organizer search 
        organizer: function () {
            
            this.organiser_ids = this.organizer != null ?  this.organizer.id : null;
        },
    }

    
}
</script>