    <!-- ***** Menu Area Starts ***** -->
    <section class="section" id="menu">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="section-heading">
                        <h6>Our Menu</h6>
                        <h2>Our selection of cakes with quality taste</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu-item-carousel">
            <div class="col-lg-12">
                <div class="owl-menu-item owl-carousel">
                    @foreach ($items as $item)
                    <form method="POST" action="{{ url('add_cart' , $item->id) }}">
                        @csrf
                    <div class="item">
                        <div class='card' style="background-image: url('menuitems/{{ $item->image }}')">
                            <div class="price"><h6>${{ $item->price }}</h6></div>
                            <div class='info'>
                              <h1 class='title'>{{ $item->title }}</h1>
                              <p class='description'>{{ $item->desc }}</p>
                              <div class="main-text-button">
                                  <div class="scroll-to-section"><a href="#reservation">Make Reservation <i class="fa fa-angle-down"></i></a></div>

                                    <input type="number" min="1" value="1" name="quantity" />
                                    <input type="submit" value="Add To Cart" />

                              </div>
                            </div>
                        </div>
                    </div>
                    </form>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <!-- ***** Menu Area Ends ***** -->
