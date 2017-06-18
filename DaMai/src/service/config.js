let apiUrl = 'http://localhost:80/0615Project/DaMai/src/api/public'
let imgUrl = 'http://localhost:99/public/static'

if (process.env.NODE_ENV === 'development') {

} else if (process.env.NODE_ENV === 'production') {
  // baseUrl = 'http://cangdu.org:8001';
}
export {
  apiUrl, imgUrl
}
