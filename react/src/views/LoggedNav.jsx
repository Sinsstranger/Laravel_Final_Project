export default function LoggedNav(props){

    const onLogout = (ev) => {
        ev.preventDefault()
    }

    return (

        <div>

            <div>
                {props.user.name}
                <a style={{marginLeft:'10px'}} href="#" onClick = {onLogout} className="btn-logout">Logout</a>
            </div>
        </div>
    )
}
