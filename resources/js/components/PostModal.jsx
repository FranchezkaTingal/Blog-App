import * as Dialog from "@radix-ui/react-dialog";

export default function PostModal(){

return(

<Dialog.Root>

<Dialog.Trigger className="bg-blue-500 text-white px-4 py-2 rounded">
Create Post
</Dialog.Trigger>

<Dialog.Portal>

<Dialog.Overlay className="fixed inset-0 bg-black/40"/>

<Dialog.Content className="fixed bg-white p-6 rounded shadow top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">

<h2 className="text-lg font-bold mb-4">
Create Post
</h2>

<form>

<input
type="text"
placeholder="Title"
className="border p-2 w-full mb-3"
/>

<textarea
placeholder="Content"
className="border p-2 w-full mb-3"
/>

<button className="bg-blue-500 text-white px-4 py-2 rounded">
Save
</button>

</form>

</Dialog.Content>

</Dialog.Portal>

</Dialog.Root>

);

}