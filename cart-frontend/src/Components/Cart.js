import React from 'react';

class Cart extends React.Component {
    
    constructor(props) {
        super(props);
        this.state = {
            cartItems: this.props.cartItems,
            cartSubtotal: 0
        }
    }

    subtotalCart() {
        let subtotal = 0;
        if(this.props.cartItems.length >= 1){
           let inCart = this.props.cartItems;
           inCart.forEach(item => {
               let itemTotal = item.price * item.quantity;
               subtotal = subtotal + itemTotal;
           });
        } 
        return subtotal;
        // this.setState({cartSubtotal:subtotal});
    }

    handleQtyChange = (item) => (event)=> {
        item.quantity = event.target.value;
        this.props.updateCart(item);
        this.subtotalCart();
    }

    render(){
        let cart = <h3>Your Cart is Empty</h3>;
        let subtotal = this.subtotalCart()
        if(this.props.cartItems.length >=1){
            cart = <div>
            <h2>CART</h2>
            <ul className="list-group">
                {this.props.cartItems.map(item => 
                    <li key={item.id} className="list-group-item">
                        <label for={item.name}>{item.name} ${item.price}</label>
                        <input name={item.name} 
                            key={item.id} 
                            type="number" 
                            defaultValue={item.quantity}
                            onChange={this.handleQtyChange(item)}
                            className="form-control"
                            min="1"
                        />
                    </li>
                )}
                
            </ul>
            <p>Subtotal: ${subtotal}</p>
            <p className="text-small">Taxes will be applied at checkout</p>
        </div>
        }

        return(
            cart
        );
    }

}

export default Cart;