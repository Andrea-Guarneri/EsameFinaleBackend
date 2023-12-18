import logo from "./logo.svg";
import "./App.css";
import { useEffect } from "react";

function App() {
    useEffect(() => {
        const fetchData = async () => {
            const response = await fetch("http://localhost:80/api/v1/login", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    // Outros cabeçalhos, se necessário
                },
                body: JSON.stringify({
                    utente: "d0573bd63e56fa30c04fb6a602c038cb1bb749ceb102892303d52ee103ac9b00d8c9f54c56b68a3ef60049981f32409ed611c25951c91beca44ca2ba64cf8056",
                }),
            })
                .then((res) => res.json())
                .then((data) => console.log(data));
        };

        fetchData();
    }, []);

    return (
        <div className="App">
            <h1>Andrea</h1>
        </div>
    );
}

export default App;
