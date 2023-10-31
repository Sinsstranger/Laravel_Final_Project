import {Link, Navigate, Outlet} from "react-router-dom";
import {useStateContext} from "../contexts/ContextProvider.jsx";
import DefaultNav from "../views/DefaultNav.jsx";
import LoggedNav from "../views/LoggedNav.jsx";


export default function DefaultLayout(){

    const {user, token} = useStateContext()

    let Nav;

    if(!token) {
        Nav = <DefaultNav />
    } else {
        Nav = <LoggedNav user = {user}/>
    }

    const onLogout = (ev) => {
        ev.preventDefault()
    }

    return (

        <div id = "defaultLayout">
            <div className="content">
                <header>
                    <div>
                        <Link to="/" className="btn-logout">Home</Link>
                    </div>
                    <nav>
                        {Nav}
                    </nav>

                    {/*<div>
                        {user.name}
                        <a href="#" onClick = {onLogout} className="btn-logout">Logout</a>
                    </div>*/}

                </header>
                <main>
                   DefaultHomePage
                </main>
            </div>
        </div>

        /*<div id = "defaultLayout">
            <aside>
                <Link to="/dashboard">Dashboard</Link>
                <Link to="/users">Users</Link>
            </aside>
            <div className="content">
                <header>
                    <div>
                        Header
                    </div>
                    <div>
                        {user.name}
                        <a href="#" onClick = {onLogout} className="btn-logout">Logout</a>
                    </div>
                </header>
                <main>
                    <Outlet />
                </main>
            </div>
        </div>*/
    )
}
