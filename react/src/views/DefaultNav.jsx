import {Link, Navigate} from "react-router-dom";
import Login from "./Login.jsx";

export default function DefaultNav(){

    const onLogin = (ev) => {
        ev.preventDefault();


    }

    return (

            <div>
                {/*<a href="/login" onClick = {onLogin} className="btn-logout">Login</a>*/}
                <Link to="/login" className="btn-logout">Login</Link>
            </div>

    )
}
