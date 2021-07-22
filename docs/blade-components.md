[Documentation](index.md) > Blade Components

# Blade Components

This package features a ton of Blade components to keep your code neat.

- [Card Layout](#card-layout)
- [Modal Layout](#modal-layout)
- [Page Layout](#page-layout)
- [Action](#action)
- [Action Column](#action-column)
- [Action Dropdown](#action-dropdown)
- [Actions](#actions)
- [Alert](#alert)
- [Array](#array)
- [Array Row](#array-row)
- [Badge](#badge)
- [Button](#button)
- [Check](#check)
- [Check Label](#check-label)
- [Close](#close)
- [Color](#color)
- [Column](#column)
- [Datalist](#datalist)
- [Desc](#desc)
- [Dropdown](#dropdown)
- [Dropdown Item](#dropdown-item)
- [Error](#error)
- [Flex](#flex)
- [Form Group](#form-group)
- [Form Row](#form-row)
- [Help](#help)
- [Icon](#icon)
- [Image](#image)
- [Input](#input)
- [Input Addon](#input-addon)
- [Item](#item)
- [Label](#label)
- [Link](#link)
- [List](#list)
- [List Row](#list-row)
- [Modal Heading](#modal-heading)
- [Nav Dropdown](#nav-dropdown)
- [Nav Link](#nav-link)
- [Pagination](#pagination)
- [Progress](#progress)
- [Radio](#radio)
- [Row](#row)
- [Select](#select)
- [Textarea](#textarea)

## Card Layout

A layout containing a small, centered card:

```html
<x-ux::layouts.card :title="__('Reset Password')" submit="save">
    <x-slot name="body">
        <x-ux::input :label="__('Email')" type="email" model="email"/>
        <x-ux::input :label="__('New Password')" type="password" model="password"/>
        <x-ux::input :label="__('Confirm New Password')" type="password" model="password_confirmation"/>
    </x-slot>

    <x-slot name="footer">
        <x-ux::button :label="__('Save')" type="submit"/>
    </x-slot>
</x-ux::layouts.card>
```

Available props:

- `title`: Bootstrap card title (via `x-slot` or attribute)
- `body`: Bootstrap card body (via `x-slot` or attribute)
- `footer`: Bootstrap card footer (via `x-slot` or attribute)
- `submit`: turn card into a form with a Livewire submit action

## Modal Layout

A layout for dynamic Livewire modals:

```html
<x-ux::layouts.modal :title="__('Change Password')" submit="save">
    <x-slot name="body">
        <x-ux::input :label="__('Current Password')" type="password" model="current_password"/>
        <x-ux::input :label="__('New Password')" type="password" model="password"/>
        <x-ux::input :label="__('Confirm New Password')" type="password" model="password_confirmation"/>
    </x-slot>

    <x-slot name="footer">
        <x-ux::button :label="__('Cancel')" color="secondary" dismiss="modal"/>
        <x-ux::button :label="__('Save')" type="submit"/>
    </x-slot>
</x-ux::layouts.modal>
```

Available props:

- `title`: Bootstrap modal title (via `x-slot` or attribute)
- `body`: Bootstrap modal body (via `x-slot` or attribute)
- `footer`: Bootstrap modal footer (via `x-slot` or attribute)
- `size`: Bootstrap modal size (eg `lg`)
- `submit`: turn modal into a form with a Livewire submit action

## Page Layout

A simple page layout with a title heading:

```html
<x-ux::layouts.page :title="__('Home')">
    {{ __('You are logged in!') }}
</x-ux::layouts.page>
```

Available props:

- `title`: page title heading (via `x-slot` or attribute)

## Action

A CRUD action button.

```html
<x-ux::action icon="eye" :title="__('Read')" click="$emit('showModal', 'users.read', {{ $user->id }})"/>
```

Available props:

- `icon`: Font Awesome icon to prepend (eg `cog`, `robot`)
- `route`: route when clicked
- `url`: URL when clicked
- `href`: href when clicked
- `click`: Livewire action when clicked
- `confirm`: add click confirmation prompt

## Action Column

A CRUD list row action row column.

```html
<x-ux::action-column>
    <x-ux::action icon="eye" :title="__('Read')" click="$emit('showModal', 'users.read', {{ $user->id }})"/>
    <x-ux::action icon="pencil-alt" :title="__('Update')" click="$emit('showModal', 'users.save', {{ $user->id }})"/>
    <x-ux::action icon="unlock-alt" :title="__('Password')" click="$emit('showModal', 'users.password', {{ $user->id }})"/>
    <x-ux::action icon="trash-alt" :title="__('Delete')" click="delete({{ $user->id }})" confirm/>
</x-ux::action-column>
```

Available props:

- `width`: Bootstrap column width (eg `3`, `4`, `auto`)
- `flex`: use flexbox on the column
- `gap`: Bootstrap flexbox gap (eg `2`, `3`)

## Action Dropdown

A CRUD action dropdown for filtering/sorting/etc.

```html
<x-ux::action-dropdown key="sort"/>
```

Available props:

- `key`: Livewire model array key

## Actions

A CRUD action container with a search input or title heading.

```html
<x-ux::actions search>
    <x-ux::button icon="plus" :title="__('Create')" click="$emit('showModal', 'users.save')"/>
    <x-ux::action-dropdown key="sort"/>
    <x-ux::action-dropdown key="filter"/>
</x-ux::actions>
```

Available props:

- `search`: use search input instead of title
- `title`: title heading (via `x-slot` or attribute)
- `align`: Bootstrap alignment (eg `start`, `end`)
- `justify`: Bootstrap justification (eg `start`, `center`)

## Alert

A Bootstrap alert.

```html
<x-ux::alert :label="__($status)"/>
```

Available props:

- `icon`: Font Awesome icon to prepend (eg `cog`, `robot`)
- `label`: alert message/label (via `slot` or attribute)
- `color`: Bootstrap color (eg `danger`, `info`)
- `dismissible`: set alert to be dismissible

## Array

An input array container with an add button.

```html
<x-ux::array key="locations">
    @foreach($this->getModel('locations', []) as $key => $location)
        <x-ux::array-row>
            <div class="col-lg mb-2 mb-lg-0">
                <x-ux::input :placeholder="__('Address')" size="sm" model="locations.{{ $key }}.address"/>
            </div>
            <div class="col-lg-auto">
                <x-ux::action icon="arrow-up" :title="__('Order Up')" click="orderModelItem('locations', {{ $key }}, 'up')"/>
                <x-ux::action icon="arrow-down" :title="__('Order Down')" click="orderModelItem('locations', {{ $key }}, 'down')"/>
                <x-ux::action icon="trash-alt" :title="__('Remove')" click="removeModelItem('locations', {{ $key }})" confirm/>
            </div>
        </x-ux::array-row>
    @endforeach
</x-ux::array>
```

Available props:

- `key`: Livewire model array key

## Array Row

An input array row container.

```html
<x-ux::array-row>
    <div class="col-lg mb-2 mb-lg-0">
        <x-ux::input :placeholder="__('Address')" size="sm" model="locations.{{ $key }}.address"/>
    </div>
    <div class="col-lg-auto">
        <x-ux::action icon="arrow-up" :title="__('Order Up')" click="orderModelItem('locations', {{ $key }}, 'up')"/>
        <x-ux::action icon="arrow-down" :title="__('Order Down')" click="orderModelItem('locations', {{ $key }}, 'down')"/>
        <x-ux::action icon="trash-alt" :title="__('Remove')" click="removeModelItem('locations', {{ $key }})" confirm/>
    </div>
</x-ux::array-row>
```

Available props:

- none

## Badge

A Bootstrap badge.

```html
<x-ux::badge :label="__('Success')" color="success"/>
```

Available props:

- `icon`: Font Awesome icon to prepend (eg `cog`, `robot`)
- `label`: badge message/label (via `slot` or attribute)
- `color`: Bootstrap color (eg `danger`, `info`)

## Button

A bootstrap button.

```html
<x-ux::button :label="__('Login')" type="submit"/>
```

Available props:

- `icon`: Font Awesome icon to prepend (eg `cog`, `robot`)
- `label`: button label (via `slot` or attribute)
- `color`: Bootstrap color (eg `danger`, `info`)
- `size`: Bootstrap button size (eg `sm`, `lg`)
- `type`: button type
- `route`: route when clicked
- `url`: URL when clicked
- `href`: href when clicked
- `dismiss`: Bootstrap dismiss when clicked
- `toggle`: Bootstrap toggle when clicked
- `click`: Livewire action when clicked
- `confirm`: add click confirmation prompt

## Check

A Bootstrap checkbox input.

```html
<x-ux::check :checkLabel="__('Remember me')" model="remember"/>
```

Available props:

- `label`: above input label (via `x-slot` or attribute)
- `checkLabel`: inline input label (via `x-slot` or attribute)
- `help`: helper text (via `x-slot` or attribute)
- `switch`: set checkbox to be a switch
- `model`: Livewire model key
- `lazy`: bind model on change

## Check Label

A Bootstrap checkbox label.

```html
<x-ux::check-label :for="remember" :label="__('Remember me')"/>
```

Available props:

- `label`: checkbox label (via `slot` or attribute)

## Close

A Bootstrap close icon button.

```html
<x-ux::close dismiss="modal"/>
```

Available props:

- `color`: Bootstrap close color (eg `white`)
- `dismiss`: Bootstrap dismiss when clicked
- `click`: Livewire action when clicked
- `confirm`: add click confirmation prompt

## Color

A Bootstrap color input.

```html
<x-ux::color :label="__('Shirt Color')" model="shirt_color"/>
```

Available props:

- `label`: above input label (via `x-slot` or attribute)
- `icon`: Font Awesome icon to prepend (eg `cog`, `robot`)
- `prepend`: content to prepend (via `x-slot` or attribute)
- `append`: content to append (via `x-slot` or attribute)
- `size`: Bootstrap input size (eg `sm`, `lg`)
- `help`: helper text (via `x-slot` or attribute)
- `model`: Livewire model key
- `lazy`: bind model on change

## Column

Responsive Bootstrap column.

```html

<x-ux::column margin="3">
    <x-ux::link :label="$user->name" click="$emit('showModal', 'users.read', {{ $user->id }})"/>
    <x-ux::item :date="$user->created_at" size="small" color="muted"/>
</x-ux::column>
```

Available props:

- `width`: Bootstrap column width (eg `3`, `4`, `auto`)
- `flex`: use flexbox on the column
- `align`: Bootstrap alignment (eg `start`, `end`)
- `justify`: Bootstrap justification (eg `start`, `center`)
- `gap`: Bootstrap flexbox gap (eg `2`, `3`)
- `margin`: Bootstrap margin (eg `1`, `3`)

## Datalist

A Bootstrap datalist input.

```html
<x-ux::datalist :label="__('Country')" :options="['Australia', 'Canada']" model="country"/>
```

Available props:

- `label`: above input label (via `x-slot` or attribute)
- `options`: array of options
- `icon`: Font Awesome icon to prepend (eg `cog`, `robot`)
- `prepend`: content to prepend (via `x-slot` or attribute)
- `append`: content to append (via `x-slot` or attribute)
- `size`: Bootstrap input size (eg `sm`, `lg`)
- `help`: helper text (via `x-slot` or attribute)
- `model`: Livewire model key
- `debounce`: bind model on keyup
- `lazy`: bind model on change

## Desc

A description list.

```html
<x-ux::desc :title="__('Name')" :data="$user->name"/>
```

Available props:

- `title`: list title (via `x-slot` or attribute)
- `icon`: Font Awesome icon to prepend (eg `cog`, `robot`)
- `iconColor`: Bootstrap color for icon (eg `danger`, `info`)
- `data`: list data (via `slot`, `x-slot` or attribute)
- `date`: date that will be converted to user timezone
- `color`: Bootstrap color (eg `danger`, `info`)
- `size`: Bootstrap button size (eg `sm`, `lg`)

## Dropdown

A Bootstrap dropdown button.

```html
<x-ux::dropdown :label="Auth::user()->name">
    <x-ux::dropdown-item :label="__('Update Profile')" click="$emit('showModal', 'auth.profile-update')"/>
    <x-ux::dropdown-item :label="__('Change Password')" click="$emit('showModal', 'auth.password-change')"/>
    <x-ux::dropdown-item :label="__('Logout')" click="logout"/>
</x-ux::dropdown>
```

Available props:

- `icon`: Font Awesome icon to prepend (eg `cog`, `robot`)
- `label`: dropdown label (via `x-slot` or attribute)
- `items`: dropdown items (via `slot` or `x-slot`)
- `color`: Bootstrap color (eg `danger`, `info`)
- `size`: Bootstrap button size (eg `sm`, `lg`)

## Dropdown Item

A Bootstrap dropdown item.

```html
<x-ux::dropdown-item :label="__('Update Profile')" click="$emit('showModal', 'auth.profile-update')"/>
```

Available props:

- `icon`: Font Awesome icon to prepend (eg `cog`, `robot`)
- `label`: the dropdown item label (via `slot` or attribute)
- `route`: route when clicked
- `url`: URL when clicked
- `href`: href when clicked
- `click`: Livewire action when clicked
- `confirm`: add click confirmation prompt

## Error

A Bootstrap validation error.

```html
<x-ux::error :key="email"/>
```

Available props:

- `key`: Livewire model key

## Flex

Bootstrap flexbox container.

```html

<x-ux::flex justify="between">
    <x-ux::check :checkLabel="__('Remember me')" model="remember"/>
    <x-ux::link :label="__('Forgot password?')" route="password.forgot"/>
</x-ux::flex>
```

Available props:

- `align`: Bootstrap alignment (eg `start`, `end`)
- `justify`: Bootstrap justification (eg `start`, `center`)
- `gap`: Bootstrap flexbox gap (eg `2`, `3`)

## Form Group

A form group container.

```html
<x-ux::form-group :label="__('Settings')">
    <x-ux::check :checkLabel="__('Active')" model="active"/>
    <x-ux::check :checkLabel="__('Assign')" model="assign"/>
</x-ux::form-group>
```

Available props:

- `label`: label content (via `slot` or attribute)

## Form Row

A form row container.

```html
<x-ux::form-row :label="__('Name')">
    <div class="col-lg mb-2 mb-lg-0">
        <x-ux::input :placeholder="__('First Name')" model="first_name"/>
    </div>
    <div class="col">
        <x-ux::input :placeholder="__('Last Name')" model="last_name"/>
    </div>
</x-ux::form-row>
```

Available props:

- `label`: label content (via `slot` or attribute)

## Help

Bootstrap form input helper text.

```html
<x-ux::help :label="$help"/>
```

Available props:

- `label`: help message/label (via `slot` or attribute)

## Icon

A Font Awesome icon.

```html
<x-ux::icon name="rocket"/>
```

Available props:

- `name`: Font Awesome name (eg `cog`, `rocket`)
- `style`: Font Awesome style (eg `regular`, `solid`)
- `size`: Font Awesome size (eg `lg`, `3x`)
- `color`: Bootstrap color (eg `danger`, `info`)
- `spin`: set icon to use spin animation
- `pulse`: set icon to use pulse animation

## Image

A Bootstrap image.

```html
<x-ux::image mix="images/avatar.png" rounded/>
```

Available props:

- `asset`: image asset path
- `mix`: image mix path
- `src`: image source path
- `fluid`: set image to fluid width
- `thumbnail`: set image to thumbnail style
- `rounded`: set image to rounded style
- `circle`: set image to circle style

## Input

A Bootstrap form input.

```html
<x-ux::input :label="__('Email')" type="email" model="email"/>
```

Available props:

- `label`: above input label (via `x-slot` or attribute)
- `type`: input type
- `icon`: Font Awesome icon to prepend (eg `cog`, `robot`)
- `prepend`: content to prepend (via `x-slot` or attribute)
- `append`: content to append (via `x-slot` or attribute)
- `size`: Bootstrap input size (eg `sm`, `lg`)
- `help`: helper text (via `x-slot` or attribute)
- `model`: Livewire model key
- `debounce`: bind model on keyup
- `lazy`: bind model on change

## Input Addon

A Bootstrap input addon icon or label.

```html
<x-ux::input-addon icon="envelope"/>
```

Available props:

- `icon`: Font Awesome icon (eg `cog`, `robot`)
- `label`: input addon label (via `slot` or attribute)

## Item

A line item.

```html
<x-ux::item icon="check" iconColor="success" :data="$user->active"/>
```

Available props:

- `icon`: Font Awesome icon to prepend (eg `cog`, `robot`)
- `iconColor`: Bootstrap color for icon (eg `danger`, `info`)
- `data`: item data (via `slot`, `x-slot` or attribute)
- `date`: date that will be converted to user timezone
- `color`: Bootstrap color (eg `danger`, `info`)
- `size`: Bootstrap button size (eg `sm`, `lg`)

## Label

A Bootstrap form label.

```html
<x-ux::label for="email" :label="__('Email')"/>
```

Available props:

- `label`: label content (via `slot` or attribute)

## Link

A hyperlink.

```html
<x-ux::link :label="__('Forgot password?')" route="password.forgot"/>
```

Available props:

- `icon`: Font Awesome icon to prepend (eg `cog`, `robot`)
- `label`: link label (via `slot` or attribute)
- `route`: route when clicked
- `url`: URL when clicked
- `href`: href when clicked
- `click`: Livewire action when clicked
- `confirm`: add click confirmation prompt

## List

A Bootstrap list group container.

```html
<x-ux::list>
    @foreach($users as $user)
    <x-ux::list-row>
        <div class="col-lg mb-3 mb-lg-0">
            <x-ux::link :label="$user->name" click="$emit('showModal', 'users.read', {{ $user->id }})"/>
            <p class="small text-muted mb-0">@displayDate($user->created_at)</p>
        </div>
        <div class="col-lg-auto d-flex gap-2">
            <x-ux::action icon="eye" :title="__('Read')" click="$emit('showModal', 'users.read', {{ $user->id }})"/>
            <x-ux::action icon="pencil-alt" :title="__('Update')" click="$emit('showModal', 'users.save', {{ $user->id }})"/>
            <x-ux::action icon="unlock-alt" :title="__('Password')" click="$emit('showModal', 'users.password', {{ $user->id }})"/>
            <x-ux::action icon="trash-alt" :title="__('Delete')" click="delete({{ $user->id }})" confirm/>
        </div>
    </x-ux::list-row>
    @endforeach
</x-ux::list>
```

Available props:

- none

## List Row

A Bootstrap list group item with a row container.

```html
<x-ux::list-row>
    <div class="col-lg mb-3 mb-lg-0">
        <x-ux::link :label="$user->name" click="$emit('showModal', 'users.read', {{ $user->id }})"/>
        <p class="small text-muted mb-0">@displayDate($user->created_at)</p>
    </div>
    <div class="col-lg-auto d-flex gap-2">
        <x-ux::action icon="eye" :title="__('Read')" click="$emit('showModal', 'users.read', {{ $user->id }})"/>
        <x-ux::action icon="pencil-alt" :title="__('Update')" click="$emit('showModal', 'users.save', {{ $user->id }})"/>
        <x-ux::action icon="unlock-alt" :title="__('Password')" click="$emit('showModal', 'users.password', {{ $user->id }})"/>
        <x-ux::action icon="trash-alt" :title="__('Delete')" click="delete({{ $user->id }})" confirm/>
    </div>
</x-ux::list-row>
```

Available props:

- none

## Modal Heading

A Bootstrap modal subheading/divider.

```html
<x-ux::modal-heading :label="__('Dates')"/>
```

Available props:

- `label`: heading label (via `slot` or attribute)

## Nav Dropdown

A Bootstrap nav dropdown.

```html
<x-ux::nav-dropdown icon="user-circle" :label="Auth::user()->name">
    <x-ux::dropdown-item :label="__('Update Profile')" click="$emit('showModal', 'auth.profile-update')"/>
    <x-ux::dropdown-item :label="__('Change Password')" click="$emit('showModal', 'auth.password-change')"/>
    <x-ux::dropdown-item :label="__('Logout')" click="logout"/>
</x-ux::nav-dropdown>
```

Available props:

- `icon`: Font Awesome icon to prepend (eg `cog`, `robot`)
- `label`: dropdown label (via `x-slot` or attribute)
- `items`: dropdown items (via `slot` or `x-slot`)

## Nav Link

A Bootstrap nav link.

```html
<x-ux::nav-link icon="sign-in-alt" :label="__('Login')" route="login"/>
```

Available props:

- `icon`: Font Awesome icon to prepend (eg `cog`, `robot`)
- `label`: link label (via `slot` or attribute)
- `route`: route when clicked
- `url`: URL when clicked
- `href`: href when clicked
- `click`: Livewire action when clicked
- `confirm`: add click confirmation prompt

## Pagination

Responsive Bootstrap pagination links.

```html
<x-ux::pagination :links="$users"/>
```

Available props:

- `links`: paginated model results
- `justify`: Bootstrap justification (eg `start`, `center`)

## Progress

A Bootstrap progress bar.

```html
<x-ux::progress percent="25" color="success"/>
```

Available props:

- `label`: progress bar label (via `slot` or attribute)
- `percent`: progress bar percent number (eg `25`)
- `color`: Bootstrap color (eg `danger`, `info`)
- `height`: progress bar height pixels (eg `15`)
- `animated`: make progress bar animated
- `striped`: make progress bar striped

## Radio

A Bootstrap radio input.

```html
<x-ux::radio :label="__('Color')" :options="['Red', 'Green', 'Blue']" model="color"/>
```

Available props:

- `label`: above input label (via `x-slot` or attribute)
- `options`: array of options
- `help`: helper text (via `x-slot` or attribute)
- `switch`: set radio to be a switch
- `model`: Livewire model key
- `lazy`: bind model on change

## Row

Bootstrap row container.

```html

<x-ux::row justify="between">
    <x-ux::column width="auto">
        &copy; {{ now()->format('Y') }}
        <x-ux::link :label="config('app.name')" route="welcome"/>
    </x-ux::column>

    <x-ux::column width="auto" flex justify="center" gap="3">
        <x-ux::link :label="__('Contact')" href="mailto:{{ config('mail.from.address') }}"/>
    </x-ux::column>
</x-ux::row>
```

Available props:

- `align`: Bootstrap alignment (eg `start`, `end`)
- `justify`: Bootstrap justification (eg `start`, `center`)
- `gap`: Bootstrap flexbox gap (eg `2`, `3`)

## Select

A Bootstrap select dropdown input.

```html
<x-ux::select :label="__('Color')" :options="['Red', 'Green', 'Blue']" model="color"/>
```

Available props:

- `label`: above input label (via `x-slot` or attribute)
- `placeholder`: first empty option label
- `options`: array of options
- `icon`: Font Awesome icon to prepend (eg `cog`, `robot`)
- `prepend`: content to prepend (via `x-slot` or attribute)
- `append`: content to append (via `x-slot` or attribute)
- `size`: Bootstrap input size (eg `sm`, `lg`)
- `help`: helper text (via `x-slot` or attribute)
- `model`: Livewire model key
- `lazy`: bind model on change

## Textarea

A Bootstrap textarea input.

```html
<x-ux::textarea :label="__('Biography')" model="biography"/>
```

Available props:

- `label`: above input label (via `x-slot` or attribute)
- `icon`: Font Awesome icon to prepend (eg `cog`, `robot`)
- `prepend`: content to prepend (via `x-slot` or attribute)
- `append`: content to append (via `x-slot` or attribute)
- `rows`: textarea rows (eg `5`)
- `size`: Bootstrap input size (eg `sm`, `lg`)
- `help`: helper text (via `x-slot` or attribute)
- `model`: Livewire model key
- `debounce`: bind model on keyup
- `lazy`: bind model on change
