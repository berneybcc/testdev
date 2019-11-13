<?php $isdisplay ="none" ?>
@if (!empty($infocontact))
    <?php $isdisplay ="block" ?>
@endif
<section class="page-section" id="list-contact" style="display:{{$isdisplay}}" data-urllist="{{action('ContactController@index')}}">
    <div class="container">

    <!-- Contact Section Heading -->
    <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0" style="padding-top:2%">List Contact</h2>

    <!-- Icon Divider -->
    <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
        <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
        <?php $isdisplay ="none" ?>            
    </div>

    <!-- Contact Section Form -->
    <div class="row">
        <div class="col-lg-12 mx-auto">
        <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
        <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Id Number</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Message</th>
                <th scope="col">Date</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $num =1;
                @endphp
                @if(!empty($infocontact))
                @foreach ($infocontact as $info)
                    <tr>
                        <td>{{$num}}</td>
                        <td>{{ $info->id_number_contact }}</td>
                        <td>{{ $info->name_contact }}</td>
                        <td>{{ $info->email_contact }}</td>
                        <td>{{ $info->phone_contact }}</td>
                        <td>{{ $info->message_contact }}</td>
                        <td>{{ $info->date_create }}</td>
                        <td><a class='js-action-edit' data-modal='editUser' href="{{action('ContactController@selectUserContact',['id'=>$info->id])}}">Edit</a> 
                        <a class='js-action-delete' href="{{action('ContactController@deleteContact',['id'=>$info->id])}}">Delete</a></td>
                   </tr>
                    @php
                       $num++;
                    @endphp
                @endforeach
                @endif
            </tbody>
        </table>
        </div>
    </div>

    </div>
</section>
