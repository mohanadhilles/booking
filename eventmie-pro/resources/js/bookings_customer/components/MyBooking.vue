<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12 table-responsive">
                 <h3 class="text-center">{{trans('em.we_will_contact')}}</h3>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="col-xs-3">{{ trans('em.event') }}</th>
                            <th class="col-xs-2">{{ trans('em.ticket') }}</th>
                            <th class="col-xs-2">{{ trans('em.order_total') }} </th>
                            <th class="col-xs-2">{{ trans('em.booked_on') }} </th>
                            <th class="col-xs-2">{{ trans('em.payment') }} </th>
                            <th class="col-xs-2">{{ trans('em.checked_in') }}</th>
                            <th class="col-xs-2">{{ trans('em.status') }}</th>
                            <th class="col-xs-2">{{ trans('em.cancellation') }}</th>
                            <th class="col-xs-2">{{ trans('em.download') }}</th>
                            <!-- <th class="col-xs-2">{{ trans('em.payment') }}</th> -->
                        </tr>
                    </thead>
                    <tbody>

                        <tr v-for="(booking, index) in bookings" :key="index" >
                            <td>
                                <a :href="eventSlug(booking.event_slug)">{{ booking.event_title+' ('+booking.event_category+')' }}</a>
                                <br><br>
                                <p class="text-bold text-small">{{ trans('em.timings') }}</p>
                                <p class="text-small">{{ moment(convert_date_to_local(booking.event_start_date)).format('MMM DD,YY')+' - '+moment(convert_date_to_local(booking.event_end_date)).format('MMM DD,YY') }}</p>
                                <p class="text-small">{{ convert_time_to_local(booking.event_start_date, booking.event_start_time, 'hh:mm A')+' - '+convert_time_to_local(booking.event_end_date, booking.event_end_time, 'hh:mm A') }}</p>
                            </td>
                            <td>
                                {{ booking.ticket_title }} <strong>{{ ' x '+booking.quantity }}</strong>

                                <br><br>
                                <p class="text-bold text-small">{{ trans('em.order_id') }} </p>
                                <p class="text-small"># {{ booking.order_number }}</p>
                            </td>
                            <td>{{ booking.net_price+' '+ currency }} </td>
                            <td>{{ moment(convert_date_to_local(booking.created_at)).format('MMM DD,YYYY') }}</td>
                            <td class="text-capitalize">
                                <span class="lgx-badge lgx-badge-small lgx-badge-mute" v-if="booking.payment_type == 'offline'">
                                    {{ booking.payment_type }}
                                    <hr class="small">
                                    <small class="text-small text-success" v-if="booking.is_paid">{{ trans('em.paid') }}</small>
                                    <small class="text-small text-danger" v-else>{{ trans('em.unpaid') }}</small>
                                </span>
                                <span class="lgx-badge lgx-badge-small lgx-badge-success" v-else>{{ booking.payment_type }} <hr class="small"><small class="text-small">{{ booking.is_paid ? trans('em.paid') : trans('em.unpaid') }}</small></span>
                            </td>
                            <td>
                                <span class="lgx-badge lgx-badge-small lgx-badge-success" v-if="booking.checked_in > 0">
                                    {{ trans('em.yes') }}
                                    <hr class="small">
                                    <small class="text-small text-white">{{ booking.checked_in +'/'+ booking.quantity }}</small>
                                </span>
                                <span class="lgx-badge lgx-badge-small lgx-badge-mute" v-else>{{ trans('em.no') }}</span>
                            </td>
                            <td>
                                <span class="lgx-badge lgx-badge-small lgx-badge-success" v-if="booking.status == 1">{{ trans('em.enabled') }}</span>
                                <span class="lgx-badge lgx-badge-small lgx-badge-mute" v-else>{{ trans('em.disabled') }}</span>
                            </td>
                            <td v-if="booking.booking_cancel == 0 && booking.status == 1 && booking.checked_in == 0">
                                <button type="button" class="lgx-btn lgx-btn-sm lgx-btn-danger" @click="bookingCancel(booking.id, booking.ticket_id, booking.event_id )">{{ trans('em.cancel') }}</button>
                            </td>
                            <td v-else>
                                <span class="lgx-badge lgx-badge-small lgx-badge-mute" v-if="booking.booking_cancel == 0">{{ trans('em.disabled') }}</span>
                                <span class="lgx-badge lgx-badge-small lgx-badge-warning" v-if="booking.booking_cancel == 1">{{ trans('em.pending') }}</span>
                                <span class="lgx-badge lgx-badge-small lgx-badge-info" v-if="booking.booking_cancel == 2">{{ trans('em.approved') }}</span>
                                <span class="lgx-badge lgx-badge-small lgx-badge-mute" v-if="booking.booking_cancel == 3">{{ trans('em.refunded') }}</span>
                            </td>
                            <td>
                                <a v-if="booking.is_paid == 1 && booking.status == 1" class="lgx-btn lgx-btn-sm lgx-btn-success" :href="downloadURL(booking.id, booking.order_number)">{{trans('em.ticket')}}</a>
                                <span class="lgx-badge lgx-badge-small lgx-badge-mute" v-else>
                                    <small v-if="booking.is_paid == 0 && booking.status == 1" class="text-small text-danger">{{ trans('em.unpaid') }}</small>
                                    <small v-else class="text-small">{{ trans('em.disabled') }}</small>
                                </span>

                                <div v-if="booking.online_location != null">
                                    <button type="button" class="lgx-btn lgx-btn-sm" @click="booking_id = booking.id">{{ trans('em.online') +' '+ trans('em.event') }}</button>
                                    <online-event  v-if="booking_id == booking.id" :online_location="booking.online_location" :booking_id="booking.id" ></online-event>
                                </div>
                            </td>

                            <!-- <td v-if="booking.booking_cancel == 0 && booking.status == 1 && booking.checked_in == 0 && booking.is_paid == 0">
                                <button type="button" class="lgx-btn lgx-btn-sm lgx-btn-success" @click="postPay(booking.id, booking.net_price)">{{ trans('em.payment') }}</button>
                            </td> -->
                            <td v-else>
                                <small class="text-small">{{ trans('em.disabled') }}</small>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="row" v-if="bookings.length > 0">
            <div class="col-md-12 text-center">
                <pagination-component v-if="pagination.last_page > 1" :pagination="pagination" :offset="pagination.total" :path="'/mybookings'" @paginate="getMyBookings()">
                </pagination-component>
            </div>
        </div>
    </div>
</template>


<script>

import PaginationComponent from '../../common_components/Pagination'
import { mapState, mapMutations} from 'vuex';
import mixinsFilters from '../../mixins.js';
var moment = require('moment');
import OnlineEvent from './OnlineEvent.vue';

export default {

    mixins:[
        mixinsFilters
    ],

    props: [
        // pagination query string
        'page',
        'is_success'

    ],

    components: {
        PaginationComponent,
        OnlineEvent,
    },


    data() {
        return {
            bookings : [],
            moment   : moment,
            pagination: {
                'current_page': 1
            },
            currency : null,
            booking_id : 0,
            payment: null,
        }
    },

     computed: {
        // get global variables
        ...mapState( []),


        current_page() {
            // get page from route
            if(typeof this.page === "undefined")
                return 1;
            return this.page;
        },
    },

    methods:{
          // get all events
        getMyBookings() {

            axios.get(route('eventmie.mybookings')+'?page='+this.current_page)
            .then(res => {
                this.currency   = res.data.currency;
                this.bookings   = res.data.bookings.data;
                this.pagination = {
                    'total' : res.data.bookings.total,
                    'per_page' : res.data.bookings.per_page,
                    'current_page' : res.data.bookings.current_page,
                    'last_page' : res.data.bookings.last_page,
                    'from' : res.data.bookings.from,
                    'to' : res.data.bookings.to
                };
            })
            .catch(error => {

            });
        },

        // cancel my booking
        bookingCancel(booking_id, ticket_id, event_id) {
            this.showConfirm(trans('em.ask_cancel_booking')).then((res) => {
                if(res) {
                    axios.post(route('eventmie.mybookings_cancel'),{
                        booking_id : booking_id,
                        ticket_id  : ticket_id,
                        event_id   : event_id,
                    })
                    .then(res => {
                        if(res.data.status)
                        {
                            this.showNotification('success', trans('em.booking_cancel_success'));
                            this.getMyBookings();
                        }
                    })
                    .catch(error => {});
                }
            })
        },

        // return route with event slug
        eventSlug(slug) {
            if(slug) {
                return route('eventmie.events_show',[slug]);
            }
        },

        // return route with download URL
        downloadURL(id, order_number) {
            if(id && order_number) {
                return route('eventmie.downloads_index',[id, order_number]);
            }
        },
        postPay(id,amount){
            if(id && amount) {
                axios.get('payment/'+id+'/'+amount).then(response => {
                console.log(this.payment)
                console.log(amount,id)
                })
            }
        }
    },
    mounted() {
        this.getMyBookings();

        // send email after successful bookings
        this.sendEmail();
    }
}
</script>


