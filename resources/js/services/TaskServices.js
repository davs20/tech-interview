
const services =  {
    projects: window.axios.get('/projects'),
    users: window.axios.get('/users')
}

export default services
