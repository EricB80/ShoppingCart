import React from 'react';

class ItemList extends React.Component
{
    constructor(props){
        super(props)
        this.state = {
            items: this.props.items,
            cartItems: this.props.cartItems,
            cart: this.props.cart
        }
    }

    handleItemChoice(item) {
        this.props.updateCart(item);
    }
    
    render(){
        return(
            <ul className="list-group">
                {this.props.items.map(item => 
                    <li key={item.id} className="list-group-item">
                        {item.name} ${item.price}
                        <div className="pull-right">
                            <button type="button" 
                                className="btn btn-success btn-sm"
                                onClick={()=>{this.handleItemChoice(item)}}
                            >
                                Add To Cart
                            </button>
                        </div>
                    </li>)
                }
            </ul>
        )
    }
}

export default ItemList;