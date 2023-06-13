@extends('layouts.webApp')

@section('content')


    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-md-6"  data-aos="fade-up">
                    <h2>Cart</h2>
                </div>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php foreach(Cart::content() as $row) :?>

                    <tr>
                        <td><?php echo $row->id; ?></td>
                        <td>
                           <?php echo $row->name; ?>
                        </td>
                        <td><input type="number" value="<?php echo $row->qty; ?>"></td>
                        <td>$<?php echo $row->price; ?></td>
                        <td>$<?php echo $row->total; ?></td>
                    </tr>

                    <?php endforeach;?>


                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="2">&nbsp;</td>
                        <td>Subtotal</td>
                        <td><?php echo Cart::subtotal(); ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">&nbsp;</td>
                        <td>Tax</td>
                        <td><?php echo Cart::tax(); ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">&nbsp;</td>
                        <td>Total</td>
                        <td><?php echo Cart::total(); ?></td>
                    </tr>
                    </tfoot>
                </table>
            </div>

        </div>
    </section>
@endsection
