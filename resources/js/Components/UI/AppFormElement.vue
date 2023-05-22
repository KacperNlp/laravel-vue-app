<template>
    <div class="flex flex-col">
        <label class="form-label">
            {{ props.labelText }}
        </label>
        <span v-if="props.error" class="text-xs mb-2 text-red-500">
            {{ props.error }}
        </span>
        <input
            :value="modelValue"
            @input="$emit('update:modelValue', $event.target.value)"
            type="text"
            class="form-input"
        />
    </div>
</template>
<script setup>
import { defineProps } from "vue";

const props = defineProps({
    error: {
        type: String,
        required: false,
    },
    labelText: {
        type: String,
        required: true,
    },
    modelValue: {
        type: String,
        required: true,
    },
});
</script>
