import PostModal from "./PostModal";
import PostDropdown from "./PostDropdown";

export default function PostsTable(){

const posts = [
{ id:1, title:"First Post"},
{ id:2, title:"Second Post"}
];

return(

<div>

<div className="flex justify-between mb-4">

<h2 className="font-semibold">
Posts
</h2>

<PostModal/>

</div>

<table className="w-full border">

<thead className="bg-gray-100">

<tr>
<th className="p-2 text-left">Title</th>
<th className="p-2 text-left">Actions</th>
</tr>

</thead>

<tbody>

{posts.map(post => (

<tr key={post.id}>

<td className="p-2">
{post.title}
</td>

<td className="p-2">
<PostDropdown/>
</td>

</tr>

))}

</tbody>

</table>

</div>

);

}