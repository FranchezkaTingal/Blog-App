import * as DropdownMenu from "@radix-ui/react-dropdown-menu";

export default function PostDropdown(){

return(

<DropdownMenu.Root>

<DropdownMenu.Trigger className="border px-3 py-1 rounded">
Actions
</DropdownMenu.Trigger>

<DropdownMenu.Content className="bg-white shadow p-2">

<DropdownMenu.Item className="p-2">
Edit
</DropdownMenu.Item>

<DropdownMenu.Item className="p-2 text-red-500">
Delete
</DropdownMenu.Item>

</DropdownMenu.Content>

</DropdownMenu.Root>

);

}