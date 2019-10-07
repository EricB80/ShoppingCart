import React from 'react';
import ItemList from './ItemList';
import Cart from './Cart';
import axios from 'axios';

class Main extends React.Component {
    state = {
        items:[],
        cartItems:[],
        cart:[]
    };

    componentDidMount(){
        axios.get('http://localhost:81/items')
        .then((res) => {
            this.setState({items:res.data});
        });

        if(this.state.cart === 'undefined' || this.state.cart.length === 0){
            axios.post('http://localhost:81/carts')
            .then((result) => {
                this.setState({cart:result.data});
            });
        }
    }

    //@TODO move this to separate class
    updateCart = (item) => {
        if(this.state.cartItems.includes(item)) {
            const idx = this.state.cartItems.findIndex(elem => elem === item);
            this.state.cartItems[idx] = item;
            this.forceUpdate();
            this.updateCartApi();
        } else {
            item.quantity = 1;
            this.setState({ cartItems: [...this.state.cartItems, item] }, () => {
                this.updateCartApi();
            });
        }
    };
    

    updateCartApi() {
        axios.put('http://localhost:81/carts/' + this.state.cart.id, {"items":this.state.cartItems},{
            headers: {
                'Content-Type': 'application/json',
            }
        });
    }

    render(){
       return( 
        <div className="row">
            <div className="col-md-6">
                <ItemList items={this.state.items} cartItems={this.state.cartItems} updateCart={this.updateCart} />
            </div>
            <div className="col-md-6">
                <Cart onAdd={this.updateCart} cartItems={this.state.cartItems} updateCart={this.updateCart} />
            </div>
        </div>
       )
    }
}

export default Main;