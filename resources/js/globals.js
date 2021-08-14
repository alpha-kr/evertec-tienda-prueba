import { reactive, watch, computed, toRef } from "vue";
import {  correct   } from "./alerts";
if (!localStorage.cart) {
    localStorage.setItem("cart", JSON.stringify([]))
}

const cartState = reactive({
    cart: JSON.parse(localStorage.cart),
});

const total = computed(() => cartState.cart.reduce((prev, item) => prev + item.quantity, 0))

const totalCart = computed(() =>"$"+cartState.cart.reduce((prev, item) => prev + item.quantity * item.price, 0).toLocaleString())

const addProduct = (product) => {
    let index = cartState.cart.findIndex((item) => item.id == product.id)
    if (index != -1) {
        let savedProduct = cartState.cart[index]
        savedProduct.quantity++
    } else {
        product.quantity = 1;
        cartState.cart.push(product)
    }
    correct( `${product.name} agregado al carrito`)
}
const restProduct = (product) => {
    let index = cartState.cart.findIndex((item) => item.id == product.id)
    if (index != -1) {
        let savedProduct = cartState.cart[index]
        savedProduct.quantity--
    }  
     
}
const clearCart=()=>localStorage.setItem("cart", JSON.stringify([]))


watch(cartState.cart, (newCart,oldCart) => {
    let index=newCart.findIndex((item) => item.quantity<=0)
    if(index!=-1){
        cartState.cart.splice(index,1)
    }
    localStorage.setItem("cart", JSON.stringify(cartState.cart))
    
})




export default { cartState, total, addProduct, totalCart ,restProduct,clearCart};