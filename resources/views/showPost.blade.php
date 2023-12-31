@extends('master')
@section('content')

<div class="page-content">
    <!--section-->
    <div class="section mt-0">
        <div class="breadcrumbs-wrap">
            <div class="container">
                <div class="breadcrumbs">
                    <a href="index.html">Home</a>
                    <span>Blog</span>
                </div>
            </div>
        </div>
    </div>
    <!--//section-->
    <!--section-->
    <div class="section page-content-first">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 aside">
                    <div class="blog-post blog-post-single">
                        <div class="blog-post-info">
                            <div class="post-date">17<span>JAN</span></div>
                            <div>
                                <h2 class="post-title"><a href="blog-post-page.html">How to Choose the Best Toothbrush</a></h2>
                                <div class="post-meta">
                                    <div class="post-meta-author">by <a href="#"><i>admin</i></a></div>
                                    <div class="post-meta-social">
                                        <a href="#"><i class="icon-facebook-logo"></i></a>
                                        <a href="#"><i class="icon-twitter-logo"></i></a>
                                        <a href="#"><i class="icon-google-logo"></i></a>
                                        <a href="#"><i class="icon-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="post-image">
                            <img src="images/blog/blog-post-img-1.jpg" alt="">
                        </div>
                        <div class="post-text">
                            <p>Oral hygiene is essential for your overall wellbeing, not just your oral health. In fact, gum disease is a major risk factor for developing certain dangerous health conditions, such as diabetes and heart disease. Brushing regularly is one of the best methods for keeping your teeth and gums healthy. However, how do you know which toothbrush is best to use?</p>
                            <h4>Tips for Choosing a Toothbrush</h4>
                            <p>There are specific features to look for in a toothbrush, regardless of whether it is powered or manual. The variety of styles, sizes, and shapes of toothbrushes available can make choosing the right one overwhelming. Here’s what to look for:</p>
                            <div class="row">
                                <div class="col-md">
                                    <img src="images/blog/blog-post-img-4.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="col-md mt-2 mt-md-0">
                                    <p><b>Expert recommendations.</b> Look for powered or manual toothbrushes with the American Dental Association Seal of Approval. You can also ask your dentist for a recommendation to ensure your toothbrush has passed quality control tests for safety and cleaning effectiveness.</p>
                                    <p><b>Bristle options.</b> Manual toothbrushes or replacement heads for your electric toothbrush are available with hard, medium, or soft nylon bristles. Soft bristles are the safest and most comfortable option for most people. You could damage the enamel protecting your teeth, root surface, and gums depending on the strength of the bristles and how vigorously you brush your teeth. Rounded bristle tips offer even more protection.</p>
                                </div>
                            </div>
                            <div class="mt-3"></div>
                            <p>Toothbrush head size. The best size of toothbrush head is one that permits easy access to the surfaces of all your teeth. A toothbrush head that’s one-inch tall and a half-inch wide is easy to use for most adults and can reach all of your teeth efficiently. The toothbrush should have a long enough handle to hold it comfortably in your hand.</p>
                            <p>Make sure to replace your toothbrush every three months or when it begins to show wear, whichever comes first. It is also vital to replace your toothbrush after you’ve had a cold because the bristles can accumulate bacteria and result in reinfection.</p>
                        </div>
                        <ul class="tags-list">
                            <li><a href="#">Dentistry</a></li>
                            <li><a href="#">Dental Implants</a></li>
                            <li><a href="#">Orthodontics</a></li>
                        </ul>
                    </div>
                    <div class="comments-block mt-4 mt-lg-7">
                        <h3>One Comment</h3>
                        <div class="comment">
                            <div class="userpic d-none d-sm-block"><span class="icon icon-user"></span></div>
                            <div class="text">
                                <div class="meta"><a href="#" class="meta-author"><b>Admin</b></a><span class="meta-date"><i class="icon icon-clock3"></i>17 Jan, 2018</span></div>
                                <p>Make sure to replace your toothbrush every three months or when it begins to show wear, whichever comes first. </p>
                                <a href="#" class="reply"><i class="icon-reply-black"></i>Reply</a>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix mt-3 mt-lg-4"></div>
                    <h3>Leave a Reply</h3>
                    <p>Your email address will not be published. Required fields are marked *</p>
                    <form class="contact-form mt-2 pb-0" id="reviewForm" method="post" novalidate="novalidate">
                        <div class="mt-0 row">
                            <div class="col-md-8">
                                <label>Your name*</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                        </div>
                        <div class="mt-15 row">
                            <div class="col-md-8">
                                <label>Email*</label>
                                <input type="text" class="form-control" name="email">
                            </div>
                        </div>
                        <div class="mt-15 row">
                            <div class="col-md-10">
                                <label>Message*</label>
                                <textarea class="form-control" name="review"></textarea>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary"><i class="icon-right-arrow"></i><span>Leave a Reply</span><i class="icon-right-arrow"></i></button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3 aside-left mt-5 mt-lg-0">
                    <div class="side-block">
                        <form action="#" class="content-search d-flex">
                            <div class="input-wrap">
                                <input type="text" class="form-control" placeholder="Keywords">
                            </div>
                            <button type="submit"><i class="icon-search"></i></button>
                        </form>
                    </div>
                    <div class="side-block">
                        <h3 class="side-block-title">Categories</h3>
                        <ul class="categories-list">
                            <li><a href="#">Cosmetic Dentistry</a></li>
                            <li><a href="#">General Dentistry</a></li>
                            <li><a href="#">Children`s Dentistry</a></li>
                            <li><a href="#">Dental Implants</a></li>
                            <li><a href="#">Orthodontics</a></li>
                            <li><a href="#">Dental Emergency</a></li>
                            <li><a href="#">Periodontics</a></li>
                            <li><a href="#">Dental Surgery</a></li>
                            <li><a href="#">Dental Crowns & Bridges</a></li>
                        </ul>
                    </div>
                    <div class="side-block">
                        <h3 class="side-block-title">Date Posts</h3>
                        <div class="calendar">
                            <div class="calendar__header">
                                <a href="#" class="prev"><i class="icon-left-arrow"></i></a>
                                <span class="month">January 2018</span>
                                <a href="#" class="next"><i class="icon-right-arrow"></i></a>
                            </div>
                            <table>
                                <tbody>
                                    <tr>
                                        <th>M</th>
                                        <th>T</th>
                                        <th>W</th>
                                        <th>T</th>
                                        <th>F</th>
                                        <th>S</th>
                                        <th>S</th>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>1</td>
                                        <td>2</td>
                                        <td>3</td>
                                        <td>4</td>
                                        <td>5</td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>7</td>
                                        <td>8</td>
                                        <td>9</td>
                                        <td>10</td>
                                        <td>11</td>
                                        <td>12</td>
                                    </tr>
                                    <tr>
                                        <td>13</td>
                                        <td>14</td>
                                        <td>15</td>
                                        <td>16</td>
                                        <td>17</td>
                                        <td>18</td>
                                        <td>19</td>
                                    </tr>
                                    <tr>
                                        <td>20</td>
                                        <td>21</td>
                                        <td>22</td>
                                        <td>23</td>
                                        <td>24</td>
                                        <td>25</td>
                                        <td>26</td>
                                    </tr>
                                    <tr>
                                        <td>27</td>
                                        <td>28</td>
                                        <td class="selected">29</td>
                                        <td>30</td>
                                        <td>31</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="side-block">
                        <h3 class="side-block-title">Tags</h3>
                        <ul class="tags-list">
                            <li><a href="#">Dentistry</a></li>
                            <li><a href="#">Dental Implants</a></li>
                            <li><a href="#">Orthodontics</a></li>
                            <li><a href="#">Dentist</a></li>
                            <li><a href="#">Dental Surgery</a></li>
                            <li><a href="#">Cosmetic Dentistry</a></li>
                            <li><a href="#">Tooth Filling</a></li>
                        </ul>
                    </div>
                    <div class="side-block">
                        <h3 class="side-block-title">Recent Posts</h3>
                        <div class="blog-post post-preview">
                            <div class="post-image">
                                <a href="blog-post-page.html"><img src="images/blog/blog-post-featured-1.jpg" alt=""></a>
                            </div>
                            <div>
                                <h4 class="post-title"><a href="blog-post-page.html">Are you brushing your teeth correctly?</a></h4>
                                <div class="post-meta">
                                    <div class="post-meta-author text-nowrap">by <a href="#"><i>admin</i></a></div>
                                    <div class="post-meta-date text-nowrap"><i class="icon icon-clock3"></i>17 Jan, 2018</div>
                                </div>
                            </div>
                        </div>
                        <div class="blog-post post-preview">
                            <div class="post-image">
                                <a href="blog-post-page.html"><img src="images/blog/blog-post-featured-2.jpg" alt=""></a>
                            </div>
                            <div>
                                <h4 class="post-title"><a href="blog-post-page.html">FREE Dental Screening & X-Rays</a></h4>
                                <div class="post-meta">
                                    <div class="post-meta-author text-nowrap">by <a href="#"><i>admin</i></a></div>
                                    <div class="post-meta-date text-nowrap"><i class="icon icon-clock3"></i>17 Jan, 2018</div>
                                </div>
                            </div>
                        </div>
                        <div class="blog-post post-preview">
                            <div class="post-image">
                                <a href="blog-post-page.html"><img src="images/blog/blog-post-featured-3.jpg" alt=""></a>
                            </div>
                            <div>
                                <h4 class="post-title"><a href="blog-post-page.html">How to Choose the Best Toothbrush</a></h4>
                                <div class="post-meta">
                                    <div class="post-meta-author text-nowrap">by <a href="#"><i>admin</i></a></div>
                                    <div class="post-meta-date text-nowrap"><i class="icon icon-clock3"></i>17 Jan, 2018</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="side-block">
                        <h3 class="side-block-title">Archives</h3>
                        <ul class="marker-list-md">
                            <li><a href="#">October 2017</a></li>
                            <li><a href="#">November 2017</a></li>
                            <li><a href="#">December 2017</a></li>
                            <li><a href="#">January 2018</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--//section-->
</div>
    
@endsection