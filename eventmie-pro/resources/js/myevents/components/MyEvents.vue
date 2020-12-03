<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a class="lgx-btn lgx-btn-red" :href="createEvent()"><span><i class="fas fa-calendar-plus"></i> {{ trans('em.create_event') }}</span></a>  
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-md-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>{{ trans('em.event') }}</th>
                            <th>{{ trans('em.start_date') }}</th>
                            <th>{{ trans('em.end_date') }}</th>
                            <th>{{ trans('em.start_time') }}</th>
                            <th>{{ trans('em.end_time') }}</th>
                            <th>{{ trans('em.repetitive') }}</th>
                            <th>{{ trans('em.edit') }}</th>
                            <th>{{ trans('em.export_attendees') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(event, index) in events" :key="index" >
                            <td><a :href="eventSlug(event.slug)">{{ event.title }}</a></td>
                            <td>{{ convert_date_to_local(event.start_date) }}</td>
                            <td>{{ convert_date_to_local(event.end_date) }}</td>
                            <td>{{ convert_time_to_local(event.start_date, event.start_time, 'hh:mm:ss A') }}</td>
                            <td>{{ convert_time_to_local(event.end_date, event.end_time, 'hh:mm:ss A') }}</td>
                            <td>{{ event.repetitive ? trans('em.yes') : trans('em.no') }}</td>
                            <td >
                                <a class="lgx-btn lgx-btn-sm" :href="eventEdit(event.slug)"><i class="fas fa-edit"></i> {{ trans('em.edit') }}</a>
                            </td>
                            <td>
                                <a :class="{ 'disabled' : event.count_bookings < 1 }" class="btn lgx-btn lgx-btn-black lgx-btn-sm btn-block" :href="exportAttendies(event.slug, event.count_bookings)"><i class="fas fa-file-csv"></i> {{ trans('em.export_attendees') }} CSV ({{ event.count_bookings }})</a>
                            </td>
                        </tr>
                    
                    </tbody>
                </table>
            </div>
        </div>

        <hr>
        <div class="row" v-if="events.length > 0">
            <div class="col-md-12 text-center">
                <pagination-component v-if="pagination.last_page > 1" :pagination="pagination" :offset="pagination.total" :path="'myevents'" @paginate="getMyEvents()"></pagination-component>
            </div>     
        </div>
    </div>
             
</template>

<script>

import PaginationComponent from '../../common_components/Pagination'

import mixinsFilters from '../../mixins.js';


var moment = require('moment');

import { VueRouter } from 'vue-router';

export default {
    props: [
        // pagination query string
        'page',
        'category'
    ],

    components: {
        PaginationComponent,
    },
    
    mixins:[
        mixinsFilters
    ],

    data() {
        return {
            events           : [],
            pagination: {
                'current_page': 1
            },
            moment           : moment,
        }
    },
    
    computed: {
        current_page() {
            // get page from route
            if(typeof this.page === "undefined")
                return 1;
            
            return this.page;
        },
    },
    methods: {
        
        // get all events
        getMyEvents() {
            axios.get(route('eventmie.myevents')+'?page='+this.current_page)
            .then(res => {
                
                this.events  = res.data.myevents.data;

                this.pagination = {
                    'total' : res.data.myevents.total,
                    'per_page' : res.data.myevents.per_page,
                    'current_page' : res.data.myevents.current_page,
                    'last_page' : res.data.myevents.last_page,
                    'from' : res.data.myevents.from,
                    'to' : res.data.myevents.to
                };
            })
            .catch(error => {
                
            });
        },

        // edit myevents
        eventEdit(event_id) {
            return route('eventmie.myevents_form', {id: event_id});
        },

        // create newevents
        createEvent() {
            return route('eventmie.myevents_form');
        },

        // return route with event slug
        eventSlug(slug){
            return route('eventmie.events_show',[slug]);
        },

        // ExportAttendies
        exportAttendies(event_slug = null, event_bookings = 0){
            if(event_slug != null && event_bookings > 0)
                return route('eventmie.export_attendees', [event_slug]);
            
        }
    },
    mounted() {
        this.getMyEvents();
    }
}
</script>
<style>

</style>